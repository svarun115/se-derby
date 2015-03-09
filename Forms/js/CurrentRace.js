count= 1;
flag=0;
function init () {
			
			//count=0;
		}
		
		function addRow () {
			tab = document.getElementsByTagName("table")[0];
			refrow = document.getElementById("row1");
			newrow = refrow.cloneNode(true);
			count++;
			if(flag==0)
			newrow.id = "row" + count;
			else
			newrow.id="row1";
			//count++;
			//btn=document.getElementById("delrow");
			//btn.id="delrow"+count;
			tab.appendChild(newrow)//document.body.appendChild()
		}

	function deleteRoww(src) {
    var row = src.parentNode.parentNode;
	if(row.id == "row1")
			{
			    flag=1;
				addRow();
				//alert("Cannot delete first row");
				flag=0;
				 row.parentNode.removeChild(row);
			
			}
	else
    row.parentNode.removeChild(row);
}
