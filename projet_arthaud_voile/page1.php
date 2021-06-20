<div class="row">
    <div class="col-md-12" style="padding:0px;padding-left:0.5em;padding-right:0.5em;">
        <div class="d-flex flex-wrap justify-content-center">
            <?php
            $data = $produit->getAll();

            foreach ($data as $row) {
            ?>

                <div class="card" style="width: 18rem;cursor:pointer;margin:0.5em;" onclick="location.href='?page=2&id=<?php echo $row['id_produit'] ?>';">
                    <img class="card-img-top" src="src/img/<?php echo $row["id_produit"] ?>.jpg" alt="Card image cap">

                    <div class="card-body" >
                        <h5 class="card-title"><?php echo $row["name"] ?></h5>
                        <p class="card-text"><?php echo $row["description"] ?></p>
                        <div class="d-flex flex-row justify-content-between">
                            <a href="#" class="btn btn-primary">ajouter au panier</a>
                            <h5 class="text-right"><?php echo $row["price"] ?> € </h5>

                        </div>
                    </div>
                </div>




            <?php
            }
            ?>
        </div>
    </div>
</div>