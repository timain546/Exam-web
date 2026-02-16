<?php
namespace app\services;

use app\models\Conversation;

class ConversationService {
    private $conv;
    public function __construct(Conversation $conv) { $this->conv = $conv; }

    public function createConversation(array $users) {
        $this->conv->create($users);
    }

    public function getConversations($user) {
        return $this->conv->getConversations($user);
    }
}
