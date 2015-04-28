step_no = 0;
url = "";
members = 0;
hr = 0;
min= 0;

document.addEventListener("DOMContentLoaded", function()
 {
    init();
 }, false);

function init() {

	results = document.getElementById("results");
	card = document.getElementById("card");
	frame = document.getElementById("frame");
	next = document.getElementById("next");
	steps = document.getElementById("steps");
	wait = document.getElementById("wait");
	details = document.getElementById("details");
	time = document.getElementById("time");

	time.style.visibility = "hidden";

	for (i = 1; i < 6; i++) { 
    	document.getElementById("img"+i).style.visibility="hidden";
}
	

	card.style.left = "0px";
	card.style.width = window.innerWidth/2-200+"px";
	card.style.height = window.innerHeight+"px";

	results.style.left = card.offsetLeft+card.offsetWidth+"px";
	results.style.top = card.offsetTop+"px";
	results.style.width = (window.innerWidth/2)+"px";
	results.style.height = window.innerHeight+"px";

	next.style.position = "absolute";
	next.style.left = card.offsetWidth/2-next.offsetWidth/2+"px";
	next.style.top = steps.offsetTop+steps.offsetHeight+100+"px";

	wait.style.position = "absolute";
	wait.style.left = card.offsetWidth/2-wait.offsetWidth/2+"px";
	wait.style.top = steps.offsetTop+steps.offsetHeight+100+"px";
	wait.style.visibility="hidden";

}

function f()
{
	next.style.visibility = "hidden";
	wait.style.visibility = "visible";

	step_no++;
	//alert(step_no);
	switch(step_no){
		case 1: url = "http://localhost/se-derby/dbs_create.php";
				getServerRequest(processResults);
				break;
		case 2: url = "http://localhost/se-derby/dummy_data/fill_data.php";
				getServerRequest(processResults);
				break;
		case 3: 
				details.innerHTML = "";
				create_members();
				break
		case 4: details.innerHTML = "";
				time.style.visibility="visible";
				
				//create_race();
				break;
		case 5: alert("The simulation has ended");
				break;
	}

  	return false;
}

function finish()
{
	wait.style.visibility = "hidden";
	next.style.visibility = "visible";
}

function getServerRequest(f)
{
	xhr = new XMLHttpRequest();
	xhr.onreadystatechange = f;
	xhr.open("GET",url,true);
	xhr.send();
}

function create_members()
{
	//alert();
		members++;
		var addr = "Dummy Address "+members;
		var city = "City"+members;
		var pin = "Pin"+members;
		var phno = "12345"+members;
		var name = "Member"+members;
		var gender = "M";
		var dob = "2014-04-02"+members;
		var memtype = 2;
		email = "member"+members+"@example.com";
		var pwd = "pwd"+members;

		url = "http://localhost/se-derby/Forms/new_member.php";
		xhr.open("POST",url,true);
		xhr.onreadystatechange = adding_balance;
		xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xhr.send("addr="+addr+"&city="+city+"&pin="+pin+"&phno="+phno+"&name="+name+"&gender="+gender+"&m_dob="+dob+"&mem_type="+memtype+"&email="+email+"&pwd="+pwd);
}

function adding_balance()
{
	if(xhr.readyState==4){
		if(members<6){
			url = "http://localhost/se-derby/Forms/account.php";
			x5 = new XMLHttpRequest();
			x5.open("POST",url,true);
			x5.onreadystatechange = mem_finish;
			x5.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			//alert("email="+email+"&balance=1000");
			x5.send("email="+email+"&balance=1000");
			}
	}
}


function mem_finish(){

	if(x5.readyState == 4)
	{
		if(members < 5)
		{
			details.innerHTML+= "<br>Member created with username : member"+members+"@example.com, password:pwd"+members;
			create_members();
		}
		else if(members==5)
		{
			details.innerHTML+= "<br>Member created with username : member"+members+"@example.com, password:pwd"+members;
			members++;
			url = "http://localhost/se-derby/Forms/new_member.php";
			x5.open("POST",url,true);
			x5.onreadystatechange = mem_finish;
			x5.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			x5.send("addr=No.10, Downing Street&city=Bangalore&pin=560085&phno=9874563210&name=admin&gender=F&m_dob=1994-07-19=&mem_type=1&email=admin&pwd=admin");
		}
		else
		{
			document.getElementById("img"+step_no).style.visibility="visible";
			details.innerHTML+= "<br>Admin created with username : admin, password:admin";
			finish();
			details.innerHTML+= "<br><br>Use the above login credentials to place bets during the race.";
		}
			
	}
}


function create_race()
{

	var name = "simRace1";
	var date = "2015-04-27";
	var catg = 2;
	var temp = 28;
	var humid = 43;
	var wind = 2.8;
	var type = 1;
	url = "http://localhost/se-derby/Forms/Race_Info_Signup.php";

	t = document.getElementById("val").value; 
	alert(t);

	set_time(t);
	//msec = Date.parse("April 27, 2015");
	raceTime = new Date();
	raceTime.setHours(hr);
	raceTime.setMinutes(min);



	time.style.visibility="hidden";
	details.innerHTML = "Creating Race.......";

	
	
	xml = new XMLHttpRequest();
	xml.open("POST",url,true);
	xml.onreadystatechange = add_horses;
	xml.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xml.send("name_of_race="+name+"&date_race="+date+"&race_catg="+catg+"&time="+t+"&type="+type+"&temp="+temp+"&humid="+humid+"&wind="+wind);
	//settimeout(start_betting,15000);
}

function add_horses()
{
	if(xml.readyState == 4)
	{
		//alert(xml.responseText);
		url = "http://localhost/se-derby/Forms/create_races.php";
		xhr = new XMLHttpRequest();
		xhr.open("POST",url,true);
		xhr.onreadystatechange = setup_tote;
		xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xhr.send("horse=One Step Salsa&jockey=Bravo Joe&trainer=Attfield Roger L&track=1\
				&horse2=Always Kitten&jockey2=Castellano Javier&trainer2=Brown Chad C&track2=2\
				&horse3=Powerful Instinct&jockey3=Zayas Edgard J&trainer3=Wilkes Ian R&track3=3\
				&horse4=Irish Mission&jockey4=Lopez Paco&trainer4=Tagg Barclay&track4=4");
	}
}

function setup_tote()
{
	if(xhr.readyState == 4)
	{
		//alert(xhr.responseText);
		//call tote_create, etc
		url = "http://localhost/se-derby/tote_table.php";
		getServerRequest(setup_tote_win);
	}
}

function setup_tote_win()
{
	if(xhr.readyState==4){
	url = "http://localhost/se-derby/tote_table_win.php";
	getServerRequest(race_created);
	}
}

function race_created()
{
	if(xhr.readyState==4){
		
		details.innerHTML = "The race has been successfully created.<br>\
							Details :<br><br>Betting will start shortly! " ;
		
		document.getElementById("img"+step_no).style.visibility="visible";
		step_no++;
		var ti = (raceTime.getTime()-180000)-((new Date).getTime());
		setTimeout(start_betting,ti);
	}
}

function start_betting()
{
	
	details.innerHTML = "Betting has started!!!<br>Members please place your bets!!\
						The odds can be viewed on the Website. An estimation of the final\
						odds is also visible.";
	var ti = (raceTime.getTime())-((new Date).getTime());
	setTimeout(start_race,ti);
}

function start_race()
{
	details.innerHTML = "Race in Progress!!! <br> Members can no longer place their bets.\
						<br>The final odds are fixed and can be viewed on the Website.";
	var ti = (raceTime.getTime()+60000)-((new Date).getTime());
	setTimeout(end_race,ti);
}

function end_race()
{
	url = "http://localhost/se-derby/Betting/update_winners.php";
	getServerRequest()
	var ti = (raceTime.getTime()+90000)-((new Date).getTime());
	details.innerHTML = "Race has ended.<br>Admin must update winners.";
	setTimeout(end_sim,ti);
}


function end_sim()
{
	details.innerHTML = "Simulation completed!!! Please view the website and database for final payoffs and results.";	
	document.getElementById("img"+step_no).style.visibility="visible";
	finish();
}


function processResults(){
	if(xhr.readyState == 4)
	{
		document.getElementById("img"+step_no).style.visibility="visible";
		switch(step_no){
		case 1: details.innerHTML = "Two MySQL databases 'Club' and 'Derby' have been created.<br>\
								Club : Schema/explanation goes here<br>\
								Derby:Schema/explanation goes here<br>";
				break;
		case 2: details.innerHTML = "The Derby database has been populated with sample data.\
									 Please check the horse, jockey and trainer tables to view\
									 the data.";
				break;
		}
			finish();
	}
	// else
	// 	alert(xhr.responseText+"\n"+xhr.readyState+"\n"+xhr.wait);
}

function set_time(str)
{
	//alert(str);
	var res = str.split(":");
	hr = Number(res[0]);
	min = Number(res[1]);
	//alert(hr+","+min);
}

