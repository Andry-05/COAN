<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'contabilità_analitica';

$conn = mysqli_connect($hostname, $username, $password, $dbname);
if(!$conn){
    die ("Errore nella connessione");
    exit();
}
else
{
    print '<br><br><strong>Connessione avvenuta correttamente</strong><br><br>';
}

$query = 'Select * from prodotti';
        $ris =  mysqli_query($conn, $query);
        if (!$ris){
            echo 'Errore nella query';
            exit();
        }
        $riga = mysqli_fetch_array($ris);
        if ($riga){
            echo "<b><font size = '5'>Elenco prodotti</font></b><br><br>";
            echo "<table border = '1'><tr><td>CODICE</td><td>QUANTITA' VENDITE</td><td>PREZZO VENDITA</td><td>ESIST. INIZIALI'</td></tr>";
            while ($riga){
                echo '<tr><td>' . $riga['Codice_Prodotto'] . '</td>';
                echo '<td>' . $riga['Quantità_Vendite'] . '</td>';
                echo '<td>' . $riga['Prezzo_Vendita'] . '</td>';
                echo '<td>' . $riga['Esistenze_Iniziali'] . '</td></tr>';
                $riga = mysqli_fetch_array($ris);
            }
            echo '</table>';
        }else{
            echo 'Non ci sono prodotti esistenti';
        }
        mysqli_close($conn);

?>
