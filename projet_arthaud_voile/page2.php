<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
            </div>
        </div>
        <?php
        $id=isset($_GET['id'])?$_GET['id']:NULL;
        $row = $produit->getOne($id);

        
        ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-8">
                            <?php
                            echo '<tr><td>' . $row["name"] . '</td><td>' . $row["price"] . '</td></tr>';
                            echo '<button id="ajouterpanier" onClick="ajouterpanier('.$id.')">ajouter au panier</button>';
                            ?>
                            
                        </div>
                        <div class="col-md-4">
                        </div>
                    </div>
                </div>
            </div>
        
    </div>
</div>