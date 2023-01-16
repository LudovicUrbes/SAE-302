<?php 

// Set valid options for selector
$valid_choices = array("1", "2", "3");
$valid_years = array("2023", "2024", "2025", "2026", "2027", "2028", "2029", "2030");
$valid_months = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12");
$valid_days = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31");
$valid_hours = array("00", "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23");
$valid_minutes = array("00", "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31", "32", "33", "34", "35", "36", "37", "38", "39", "40", "41", "42", "43", "44", "45", "46", "47", "48", "49", "50", "51", "52", "53", "54", "55", "56", "57", "58", "59");
$valid_seconds = array("00", "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31", "32", "33", "34", "35", "36", "37", "38", "39", "40", "41", "42", "43", "44", "45", "46", "47", "48", "49", "50", "51", "52", "53", "54", "55", "56", "57", "58", "59");

?>

<br/>
<!-- Form to send in the database the dates selected by the administrator -->
<section class="rounded-lg bg-gray-200">
<br/>
<h1 class="text-1xl ml-4"><strong>Définir une date pour :</strong></h1>
<br/>
<form method="post" action="/SAE-302/concours/admin.php" class="col-span-3 ml-4">

    <select name="choix" class="rounded bg-white text-black">
        <option value="1">Fin d'envoi</option>
        <option value="2">Début des votes</option>
        <option value="3">Fin des votes</option>
    </select>
    <br/>
    <br/>

    <span class="rounded inline-grid grid-cols-6 gap-2">
        <span>
            jour
        </span>
        <span>
            mois
        </span>
        <span>
            année
        </span>
        <span>
            heures
        </span>
        <span>
            minutes
        </span>
        <span>
            secondes
        </span>

        <span>
            <select name="jour" class="rounded bg-white text-black">
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
            </select>
        </span>

        <span>
            <select name="mois" class="rounded bg-white text-black">
                <option value="01">Janvier</option>
                <option value="02">Février</option>
                <option value="03">Mars</option>
                <option value="04">Avril</option>
                <option value="05">Mai</option>
                <option value="06">Juin</option>
                <option value="07">Juillet</option>
                <option value="08">Août</option>
                <option value="09">Septembre</option>
                <option value="10">Octobre</option>
                <option value="11">Novembre</option>
                <option value="12">Décembre</option>
            </select>
        </span>
        <span>
            <select name="année" class="rounded bg-white text-black">
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
                <option value="2027">2027</option>
                <option value="2028">2028</option>
                <option value="2029">2029</option>
                <option value="2030">2030</option>
            </select>
        </span>

        <span>
            <select name="heures" class="rounded bg-white text-black">
                <option value="00">00</option>
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
            </select>
        </span>

        <span>
            <select name="minutes" class="rounded bg-white text-black">
                <option value="00">00</option>
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
                <option value="32">32</option>
                <option value="33">33</option>
                <option value="34">34</option>
                <option value="35">35</option>
                <option value="36">36</option>
                <option value="37">37</option>
                <option value="38">38</option>
                <option value="39">39</option>
                <option value="40">40</option>
                <option value="41">41</option>
                <option value="42">42</option>
                <option value="43">43</option>
                <option value="44">44</option>
                <option value="45">45</option>
                <option value="46">46</option>
                <option value="47">47</option>
                <option value="48">48</option>
                <option value="49">49</option>
                <option value="50">50</option>
                <option value="51">51</option>
                <option value="52">52</option>
                <option value="53">53</option>
                <option value="54">54</option>
                <option value="55">55</option>
                <option value="56">56</option>
                <option value="57">57</option>
                <option value="58">58</option>
                <option value="59">59</option>
            </select>
        </span>

        <span>
            <select name="secondes" class="rounded bg-white text-black">
                <option value="00">00</option>
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
                <option value="32">32</option>
                <option value="33">33</option>
                <option value="34">34</option>
                <option value="35">35</option>
                <option value="36">36</option>
                <option value="37">37</option>
                <option value="38">38</option>
                <option value="39">39</option>
                <option value="40">40</option>
                <option value="41">41</option>
                <option value="42">42</option>
                <option value="43">43</option>
                <option value="44">44</option>
                <option value="45">45</option>
                <option value="46">46</option>
                <option value="47">47</option>
                <option value="48">48</option>
                <option value="49">49</option>
                <option value="50">50</option>
                <option value="51">51</option>
                <option value="52">52</option>
                <option value="53">53</option>
                <option value="54">54</option>
                <option value="55">55</option>
                <option value="56">56</option>
                <option value="57">57</option>
                <option value="58">58</option>
                <option value="59">59</option>
            </select>
        </span>
    
    </span>

    <br/>
    <br/>

    <button class="flex col-span-3 w-fit h-fit bg-green-200 hover:bg-green-300 text-green-700 font-bold py-2 px-4 rounded inline-flex items-center">
        <input type="submit" class="cursor-pointer" value="Valider" name="date">
    </button>

<?php

if (isset($_POST['date']))
{
    // Verify that the selected value is valid
    if (isset($_POST['choix'], $_POST['année'], $_POST['mois'], $_POST['jour'], $_POST['heures'], $_POST['minutes'], $_POST['secondes'])) {
      if (in_array($_POST['choix'], $valid_choices) && in_array($_POST['année'], $valid_years) && in_array($_POST['mois'], $valid_months) && in_array($_POST['jour'], $valid_days) && in_array($_POST['heures'], $valid_hours) && in_array($_POST['minutes'], $valid_minutes) && in_array($_POST['secondes'], $valid_seconds)) {
        $selected_choice = htmlspecialchars($_POST['choix'], ENT_QUOTES, 'UTF-8');
        $selected_year = htmlspecialchars($_POST['année'], ENT_QUOTES, 'UTF-8');
        $selected_month = htmlspecialchars($_POST['mois'], ENT_QUOTES, 'UTF-8');
        $selected_day = htmlspecialchars($_POST['jour'], ENT_QUOTES, 'UTF-8');
        $selected_hours = htmlspecialchars($_POST['heures'], ENT_QUOTES, 'UTF-8');
        $selected_minutes = htmlspecialchars($_POST['minutes'], ENT_QUOTES, 'UTF-8');
        $selected_seconds = htmlspecialchars($_POST['secondes'], ENT_QUOTES, 'UTF-8');
      } else {
        // Handling an error if the selected value is invalid
        echo "Sélection de date non valide";
        exit();
      }
    }

    if ($selected_choice == 1) {
        // End date of each phase of the competition
        $date = "$selected_year-$selected_month-$selected_day $selected_hours:$selected_minutes:$selected_seconds";
        $bdd = getPDO();
        $sql = "UPDATE dates SET fin_envoi = :date_choisie WHERE id = 1";
        $req = $bdd->prepare($sql);
        $req->bindParam(":date_choisie", $date);
        $req->execute();
        $req->closeCursor();
    }elseif ($selected_choice == 2) {
        // End date of each phase of the competition
        $date = "$selected_year-$selected_month-$selected_day $selected_hours:$selected_minutes:$selected_seconds";
        $bdd = getPDO();
        $sql = "UPDATE dates SET debut_vote = :date_choisie WHERE id = 1";
        $req = $bdd->prepare($sql);
        $req->bindParam(":date_choisie", $date);
        $req->execute();
        $req->closeCursor();
    }elseif ($selected_choice == 3) {
        // End date of each phase of the competition
        $date = "$selected_year-$selected_month-$selected_day $selected_hours:$selected_minutes:$selected_seconds";
        $bdd = getPDO();
        $sql = "UPDATE dates SET fin_vote = :date_choisie WHERE id = 1";
        $req = $bdd->prepare($sql);
        $req->bindParam(":date_choisie", $date);
        $req->execute();
        $req->closeCursor();
    }else {
        echo "ERREUR : La sélection de la date est erronée !";
    }
}

?>

</form>
<br/>
</section>