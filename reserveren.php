<?php
	$errors = null;


	$currenthour = date("H");
	$currentmin = date("i");
	$currentdate = date("d");

	$currentmonth = date("n");

if(isset($_POST['date'])){
    $time = strtotime($_POST['date']);
    if ($time) {
      $new_date = date('d-m-Y', $time);
      $day = date('d', $time);
      $month = date('n', $time);
     // echo $new_date;
    } else {
       echo 'Datum ERROR!: ' . $_POST['date'];
      $errors = true;
    }
}


	if(isset($_POST['hour'])){
		$hour = $_POST['hour'];

		if($hour >= 21){
			$sh->MaakError("U kan alleen tussen 8 uur s'ochtends en 9 s'avonds reserveren..");
			$errors = true;
		}
		elseif($hour < 8)
		{
		 		$sh->MaakError("U kan alleen tussen 8 uur s'ochtends en 9 s'avonds reserveren..");
			$errors = true;
		}


	}

	if(isset($_POST['min']))
	{
		 $min = $_POST['min'];
		if($min >= 60)
		{
			$sh->VeldError();
			$errors = true;
		}
		elseif($min < 0){
			 $sh->VeldError();
			 $errors = true;
		}
		
	}
	if(isset($hour)  && isset($day)){
		$d = ltrim($day, '0');
		$d2 = ltrim($currentdate, '0');
	    if(  $hour < $currenthour &&  $d < $d2 || $month < $currentmonth )
		{
			 
			 $sh->MaakError("De geplande tijd/datum is in het verleden.."  );
			 
		}
		else{
		 
	


if(isset($_POST['hour']) && isset($_POST['min']) && isset($_POST['date']) && $_POST['aantalPersonen'] > 0){
	if(!$errors){
		if(!$sh->CheckVoorReservatie($sh->conn, $_SESSION['klantID'], $new_date)){  
			echo "<b>Bedankt voor uw reservatie, er wordt een bevestigings mail gestuurd naar: " . $_SESSION['email']  . "</b>";
            $sh->MaakReservatie($_POST['aantalPersonen'], $new_date, $hour . ":" . $min);
        }
        else{
        		$sh->MaakError("Je hebt voor de geplande dag al een reservatie staan! wijzig de reservatie van vandaag of verwijder de reservatie..");
        }
	}
}
}
}
 
?>
<div id="fill"></div>
<br><span>Vul een reservatie tijd in om te reserveren bij bon temps!</span>

<div id="container">
<br>
	<form method="POST">
		<input type="number" name="aantalPersonen" min="1" onKeyDown="return false" placeholder="personen" style="width: 100px;">
         <input type="date" name="date">
		<input type="input" name="hour" maxlength="2" placeholder="Uur" style="width: 60px">
		 <select id="minuut" name="min">
<OPTION>00</OPTION>
 <option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option><option>07</option><option>08</option><option>09</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option><option>32</option><option>33</option><option>34</option><option>35</option><option>36</option><option>37</option><option>38</option><option>39</option><option>40</option><option>41</option><option>42</option><option>43</option><option>44</option><option>45</option><option>46</option><option>47</option><option>48</option><option>49</option><option>50</option><option>51</option><option>52</option><option>53</option><option>54</option><option>55</option><option>56</option><option>57</option><option>58</option><option>59</option><option>60
		 </select>
		<br><br><input type="submit" name="submit" value="reserveren maar!">


	</form>

<br>
 
<div id="fill"></div>
<span class="center"><h3 id="center">reservaties van vandaag </h3>
 <?php echo "  <br> het is vandaag: " . date("d/m/y") . "<br>"; ?></span><br>
 <span id="center">
 	 <p id="center">
<?php 

$sh->ReservatiesVandaag($sh->conn);
 
?> 

</p>
</span>
 
</div>
