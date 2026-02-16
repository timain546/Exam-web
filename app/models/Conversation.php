<?php
namespace app\models;

class Conversation {
    private $pdo;
    public function __construct(\PDO $pdo) { $this->pdo = $pdo; }

    public function create(array $users) {
        $this->pdo->exec("INSERT INTO conversation(date_creation) VALUES (NOW())");

        $stt = $this->pdo->prepare("INSERT INTO user_conversation(id_user, id_conversation) VALUES (?,?)");
        $id = $this->pdo->lastInsertId();

        foreach($users as $u) {
            $stt->execute(array($u, $id));
        }
    }

    private function getLastMessage($conv) {
        $stt = $this->pdo->prepare("SELECT texte, date_envoie FROM message WHERE id_conversation = ? ORDER BY date_envoie DESC LIMIT 1");
        $stt->execute([$conv]);
        $result = [];
        if($row = $stt->fetch()) {
            $result = $row;
        }
        return $result;
    }

    private function getOtherUserConversation($conv, $user) {
        $stt = $this->pdo->prepare("SELECT u.name FROM user_conversation m JOIN user u ON m.id_user = u.id WHERE id_conversation = ? AND m.id_user != ?");
        $stt->execute([$conv, $user]);
        $result = [];
        while($row = $stt->fetch()) {
            $result[] = $row;
        }
        return $result;
    }

    public function getConversations($user) {
        $stt = $this->pdo->prepare("SELECT id_conversation FROM user_conversation WHERE id_user = ?");
        $stt->execute([$user]);
        $conv = [];
        while($row = $stt->fetch()) {
            $conv[] = $row;
        }

        $result = [];
        foreach($conv as $c) {
            $result[] = [
                'id' => $c['id_conversation'],
                'message' => $this->getLastMessage($c['id_conversation']),
                'users' => $this->getOtherUserConversation($c['id_conversation'],$user)
            ];
        }
        return $result;
    }
}
