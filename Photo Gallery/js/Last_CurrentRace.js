count= 1;
function init () {
			
			//count=0;
		}
		
		function addRow () {
			tab = document.getElementsByTagName("table")[0];
			refrow = document.getElementById("row1");
			newrow = refrow.cloneNode(true);
			count++;
			newrow.id = "row" + count;
			//count++;
			//btn=document.getElementById("delrow");
			//btn.id="delrow"+count;
			tab.appendChild(newrow)//document.body.appendChild()
		}

	function deleteRoww(src) {
    var row = src.parentNode.parentNode;
	if(row.id == "row1")
			{
				alert("Cannot delete first row");
			
			}
	else
    row.parentNode.removeChild(row);
}