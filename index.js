const xmlhttp = new XMLHttpRequest()
xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          const myObj = JSON.parse(this.responseText)
          for(let apt of myObj){
            const tr = document.createElement("tr")
            const aptTable = document.getElementById("apartment-table")
            const aptRow = aptTable.insertRow()
            const aptNameCell = aptRow.insertCell(0).innerHTML = `${apt.ApartmentName}`
            const aptBedCell = aptRow.insertCell(1).innerHTML = `${apt.Beds}`
            const aptBathCell = aptRow.insertCell(2).innerHTML = `${apt.Baths}`
            const aptFloorPlanCell = aptRow.insertCell(3).innerHTML = `${apt.FloorplanName}`
            const aptRentCell = aptRow.insertCell(4).innerHTML = "$" + `${apt.MinimumRent}` + " - " + "$" + `${apt.MaximumRent}`
            const aptApplyCell = aptRow.insertCell(5).innerHTML = `<a href=${apt.ApplyOnlineURL}>Apply</a>`
          }
      }
  };
xmlhttp.open("GET", "index.php", true);
xmlhttp.send();
