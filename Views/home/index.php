<div class="row">

<?php foreach ($products as $produit): ?>

<div class="col-md-4">
    <div class="card mb-4 shadow-sm">
        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"><?= $produit->getName(); ?></text></svg>
        <div class="card-body">
            <p class="card-text"><?= $produit->getExtrait(250) ?></p>
            <p class="text-muted"><?= $produit->getPrix().'€' ?></p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a class="btn btn-success" href="/panier/add/<?= $produit->getId() ?>">Ajouter au panier</a>
                    <a class="btn btn-secondary" href="/produit/<?= $produit->getId() ?>">Voir</a>
                </div>
                <small class="text-muted">9 mins</small>
            </div>
        </div>
    </div>
</div>

<?php endforeach; ?>

</div>
