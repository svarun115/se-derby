count= 0;
function init () {
			
			//count=0;
		}
		
		function addRow () {
			tab = document.getElementsByTagName("table")[0];
			refrow = document.getElementById("row1");
			newrow = refrow.cloneNode(true);
			newrow.id = "row" + count;
			count++;
			btn=document.getElementById("delrow");
			btn.id="delrow"+count;
			btn.addEventListener("click",deleteRow,false);
			tab.appendChild(newrow)//document.body.appendChild()
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