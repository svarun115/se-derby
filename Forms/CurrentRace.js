count= 2;
function init () {
			
			//count=0;
		}
		
		function addRow () {
			tab = document.getElementsByTagName("table")[0];
			refrow = document.createElement("tr");
			h=document.getElementById("horse");
			j=document.getElementById("jockey");
			t=document.getElementById("trainer");
			tk=document.getElementById("track");
			hnew=document.cloneNode(h);
			jnew=document.cloneNode(j);
			tnew=document.cloneNode(t);
			tknew=document.cloneNode(tk);
			hnew.name="horse"+count;
			tnew.name="trainer"+count;
			jnew.name="jockey"+count;
			tknew.name="track"+count;
			rnew = document.createElement("tr");
			td1=document.createElement("td");
			td2=document.createElement("td");
			td3=document.createElement("td");
			td4=document.createElement("td");
			td5=document.createElement("td");
			rnew.appendChild(td1);
			rnew.appendChild(td2);
			rnew.appendChild(td3);
			rnew.appendChild(td4);
			rnew.appendChild(td5);
			td1.appendChild(hnew);
			td2.appendChild(jnew);
			td3.appendChild(tnew);
			td4.appendChild(tknew);
	

			rnew.id = "row" + count;

			count++;
			bt=document.getElementById("delrow");
			btn=document.cloneNode(bt);
			btn.id="delrow"+count;
			btn.addEventListener("click",deleteRow,false);
			td5.appendChild(btn);
			tab.appendChild(rnew)//document.body.appendChild()
		}

		function deleteRow () {
			alert(this.id);
			ielement = document.getElementsByTagName('input');
			//alert(ielement.length);
			/*for(var i=0; i< ielement.length ; i++)
			{
				// alert("hh");
				if ((ielement[i].type=="checkbox") && (ielement[i].checked==true)) 
					{
						//alert("hee");
						p=ielement[i].parentNode.parentNode;
						tab.removeChild(p);
						i=0;
					}

			}*/
		}