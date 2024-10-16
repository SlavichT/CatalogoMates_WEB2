<?php require_once 'templates/header.phtml' ?>

<div class="row">

<?php foreach ($categorias as $categoria): ?>

<div class="list-group">
        
    <button type="button" class="list-group-item list-group-item-action active" aria-current="true">
    $categoria</button>
    
</div>

<?php require_once 'templates/footer.phtml' ?>