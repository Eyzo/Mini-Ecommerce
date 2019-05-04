<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Nom</th>
        <th scope="col">Description</th>
        <th scope="col">Prix Unitaire</th>
        <th scope="col">Quantitées</th>
        <th scope="col">Prix Totale</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($produits as $produit) : ?>
        <tr>
            <th scope="row"><?= $produit->getName(); ?></th>
            <td><?=  $produit->getExtrait(250); ?></td>
            <td><?= $produit->getPrix(); ?>€</td>
            <td><?= $panier[$produit->getId()] ?></td>
            <td><?= $panier[$produit->getId()] * $produit->getPrix() ?>€</td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
