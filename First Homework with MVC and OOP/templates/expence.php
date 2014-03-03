<a href="index.php"> Списък</a> <br/>
<a href="data.txt"> База Данни </a> <br/>

<form method="post" action="expence.php">
<label for="ware">Стока:</label>
        <div><input id="ware" type="text" name="ware"/> </div>
        <label for="value">Цена:</label>
        <div> <input type="text" name="value"/> лв </div>
        <br/>

        <select size="1" name="type">
        
        //we display all the types of wares we can select to be submitted
    <?php
   foreach ($types as $key=>$value) {
    echo '<option value="' . $key . '">' . $value . '</option>';
        }

    ?>

        </select> <br/>
        <div><input type="submit" value="Въведи!"/> </div>
</form>
