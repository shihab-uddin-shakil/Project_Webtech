<style>
.navbar {
    overflow: hidden;
    background-color: #333;
    position: sticky;
    position: -webkit-sticky;
    top: 0;
    height: 80px;
}

/* Style the navigation bar links */
.navbar a {
    float: left;
    display: block;
    color: white;
    text-align: center;
    padding: 14px 20px;
    text-decoration: none;
    font-size: 30px;
}


/* Right-aligned link */
.navbar a.right {
    float: right;
}

/* Change color on hover */
.navbar a:hover {
    background-color: #ddd;
    color: black;
}

/* Active/current link */
.navbar a.active {
    background-color: #666;
    color: white;
}

input[type=text] {
    width: 100px;
    box-sizing: border-box;
    border: 2px solid orangered;
    border-radius: 2px;
    font-size: 16px;
    background-color: papayawhip;
    background-position: 10px 10px;
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    transition: width 0.4s ease-in-out;

}

.account {
    margin-left: 350px;
}

input[type=button],
input[type=submit],
input[type=reset],
button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
}

input[type=text]:focus {
    width: 20%;
}

label,
li {
    font-size: 25px;
    color: orange;
}

*,
*:before,
*:after {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background: #105469;
    font-family: "Open Sans", sans-serif;
}

table {
    background: #012b39;
    border-radius: 0.25em;
    border-collapse: collapse;
    margin: 1em;
    width: 100%;
}

th {
    border-bottom: 1px solid #364043;
    color: #e2b842;
    font-size: 0.85em;
    font-weight: 600;
    padding: 0.5em 1em;
    text-align: left;
}

td {
    color: #fff;
    font-weight: 400;
    padding: 0.65em 1em;
}

.disabled td {
    color: #4f5f64;
}

tbody tr {
    transition: background 0.25s ease;
}

tbody tr:hover {
    background: #014055;
}
</style>

<header>
    <div class="navbar">
        <a href="http://localhost/Admin/Admin.php">
            Admin
        </a>
        <!-- <a href="">logout</a> -->
        <a href="http://localhost/Admin/logout.php" class="right">Logout</a>
    </div>


</header>