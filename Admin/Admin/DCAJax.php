<!DOCTYPE html>
<html>

<head>
    <title>control doctors</title>
</head>

<body>


    <?php
  include("navbar.php");
  ?>

    <div class="account">
        <label for="username">Account:</label>
        <input type="text" id="username" name="username">
        <!-- <input type="submit" name="Go" onclick="search()" value="Go"> -->
        <button type="user" onclick="user();" name="user">Serarch</button>
        <!-- <button type="submit" onclick="search()" name="Go" value="Go">Serarch</button> -->
        <ul>
            <li id="Ename"></li>
            <li id="Ecgory"></li>
            <li id="Email"></li>
            <li><input type="text" id="Estatus" name="Estatus">
            </li>
        </ul>


        <br>
        <p id="error"> </p>

        <br>
        <button type="submit" onclick="submit();" name="submit">update</button>

    </div>
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for doctors..." title="Type in a name">
    <br><br>
    <p id="p2"></p>

    <br>
    <hr>
    <br>



    <script>
    function submit() {

        var username = document.getElementById("username").value;
        var status = document.getElementById("Estatus").value;

        if (username == "" || status == "") {
            document.getElementById("error").innerHTML = "Fill up the form properly";
            document.getElementById("error").style.color = "orange";
        } else {

            if (status == "inactive" || status == "active") {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("error").innerHTML = xhttp.responseText;
                        document.getElementById("error").style.color = "green";
                    }
                }

                xhttp.open("POST", "http://localhost/Admin/userAction.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("username=" + username + "&status=" + status);
                search();

            } else {
                document.getElementById("error").innerHTML = "Invalid status....";
                document.getElementById("error").style.color = "orange";
            }

        }
    }

    function search() {

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                document.getElementById("p2").innerHTML = xhttp.responseText;
                console.log(xhttp.responseText);
            }
        }

        xhttp.open("GET", "DCAction.php?", true);
        xhttp.send();
    }
    search();


    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    function user() {
        var username = document.getElementById("username").value;
        console.log(username);
        if (username == "") {
            document.getElementById("Ename").innerHTML = " ";
            document.getElementById("Ecgory").innerHTML = " ";
            document.getElementById("Email").innerHTML = "";
            document.getElementById("Estatus").value = "";
            document.getElementById("error").innerHTML = "Fill up the username ...";
            document.getElementById("error").style.color = "red";
        } else {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    //document.getElementById("error").innerHTML = xhttp.responseText;
                    var res = JSON.parse(xhttp.responseText);
                    // console.log(xhttp.responseText);
                    // console.log(res);
                    var identy = 0;
                    for (var i = 0; i < res.length; i++) {
                        if (res[i].username == username) {
                            //Estatus
                            document.getElementById("Ename").innerHTML = res[i].fname + " " + res[i].lname;
                            document.getElementById("Ecgory").innerHTML = res[i].category;
                            document.getElementById("Email").innerHTML = res[i].email;
                            document.getElementById("Estatus").value = res[i].status;
                            document.getElementById("error").innerHTML = "";
                            identy = 1;
                            // console.log(res[i].status);
                        }
                        search();

                    }
                    if (identy == 0) {
                        document.getElementById("error").innerHTML = " username not found ...";
                        document.getElementById("error").style.color = "orange";
                    }

                    // document.getElementById("error").innerHTML = xhttp.responseText;
                }
            }

            xhttp.open("GET", "http://localhost/Admin/userAction.php?", true);
            xhttp.send();
        }


    }
    </script>

</body>

</html>