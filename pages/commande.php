<?php
    require "./admin/lib/PHP/verifier_connexion.php";
    $obj = new commandeDB($cnx);
    $liste = $obj->getCommandes();
    $nbr = count($liste)-1;
?>
<section class="col-sm-12 bloc2" style="color : white; text-align: center;">
    <h2>Commandes :</h2>
</section>
<?php
if($nbr!=0)
{
?>
    <section class="col-sm-12 bloc1" style="text-align: center;"><br/><br/>
        <table class="table-responsive" style="font-size : 150%; text-align : center;" cellpadding="5">
            <tr>
                <th style="width : 7%; border : 2px solid black;">Date</th>
                <th style="width : 7%; border : 2px solid black;">Montant</th>
                <th style="width : 7%; border : 2px solid black;">Livraison</th>
            </tr>
            <?php
            for($i=0;$i<$nbr;$i++)
            {
                $date = $liste[$i]->DATE;
                if($i!=$nbr-1)
                {
                ?>
                <tr>
                    <td style="width : 7%; border-right : 2px solid black; border-left : 2px solid black;"><br/><?php print trim($date);?></td>
                    <td style="width : 7%; border-right : 2px solid black;"><br/><?php print $liste[$i]->TOTAL;?></td>
                    <td style="width : 7%; border-right : 2px solid black;"><br/><?php print $liste[$i]->LIVRAISON;?></td>
                </tr>
                <?php }
                else
                { ?>
                <tr>
                    <td style="width : 7%; border-right : 2px solid black; border-left : 2px solid black; border-bottom : 2px solid black;"><br/><?php print trim($date);?></td>
                    <td style="width : 7%; border-right : 2px solid black; border-bottom : 2px solid black;"><br/><?php print $liste[$i]->TOTAL;?></td>
                    <td style="width : 7%; border-right : 2px solid black; border-bottom : 2px solid black;"><br/><?php print $liste[$i]->LIVRAISON;?></td> </tr><?php
                }
            }
            ?>
        </table><br/><br/>
    </section>
<?php }
else
{ ?>
    <section class="col-sm-12 bloc1" style="text-align: center;">
        <p>
            <h2>Désolé,</h2>
            mais vous n'avez pas encore passé de commandes !
        </p><br/>
    </section>
<?php }