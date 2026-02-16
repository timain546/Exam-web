<?php

$navItems = [
    ['url' => '', 'icon' => 'ri-home-fill', 'label' => 'Home'],
    ['url' => 'products', 'icon' => 'ri-shopping-basket-2-fill', 'label' => 'Produits'],
    ['separator' => true, 'label' => 'Section'],
    ['url' => 'item', 'icon' => 'ri-square-fill', 'label' => 'Item'],
];

?>


<aside id="sidebar" class="navbar navbar-expand-md align-items-start flex-shrink-0">
  <div id="sidebarDiv" class="offcanvas offcanvas-start d-md-block" tabindex="-1">
    <ul class="nav flex-column">
      <?php foreach ($navItems as $item) {
        if (isset($item['separator'])) { ?>
          <li>
            <span class="nav-separator d-flex align-items-center">
              <span class="me-2 sidebar-text"><?= $item['label'] ?></span>
              <hr class="flex-grow-1 my-0">
            </span>
          </li>
        <?php } else {
          $active = '';
          if ($item['url'] === '') {
            if (Flight::request()->url === '/') $active = 'active';
          }
          else if (str_starts_with(Flight::request()->url, '/' . $item['url'])) {
            $active = 'active';
          }
          ?>
          <li>
            <a href="<?= $item['url'] ?>" class="nav-link d-flex align-items-center <?= $active ?>">
              <i class="<?= $item['icon'] ?>"></i>
              <span class="ms-2 sidebar-text"><?= $item['label'] ?></span>
            </a>
          </li>
        <?php }
      } ?>
    </ul>
  </div>
</aside>


<script>
  const toggleBtn = document.getElementById('toggleSidebarButton');
  const sidebar = document.getElementById('sidebar');

  toggleBtn.addEventListener('click', () => {
    toggleBtn.classList.toggle('toggled');
    sidebar.classList.toggle('compact');
  });
</script>
