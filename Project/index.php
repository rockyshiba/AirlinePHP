<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Welcome to PHP Airlines</title>
        <link rel="stylesheet" href="css/index.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'/>
    </head>
    <body>
        <header id="header">
            <section id="top-head"> 
                <div class="wrapper">
                    <div class="row">
                        <div id="logoBox" class="col-8">
                            <img id="logo" alt="PHP Airlines Logo" src="images/logo.png"/>
                        </div>
                        <div id="loginBox" class="col-4">
                            <div id="loginOpt" class="row">
                                <div class="col-8">
                                    <span>
                                        <i class="fa fa-sign-in fa-2x red"></i>
                                    </span>
                                </div>
                                <div class="col-4">
                                    <a href="#" class="red">ADMIN LOG-IN</a>
                                </div>
                            </div>
                            <form id="searchBox" class="row">
                                <div class="col-4">
                                    <span>
                                        <i class="fa fa-search"></i>
                                    </span>
                                </div>
                                <div class="col-8">
                                    <label for="search" class="hidden">Enter Search Words</label>
                                    <input id="search" type="type"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <section id="navbar">
                <div class="wrapper">
                    <nav id="main-nav" class="row">
                        <div class="col-1-of-5"><!--will have to add onclick events for all these-->
                        PLAN &amp; BOOK
                        </div>
                        <div class="col-1-of-5">
                        DESTINATIONS
                        </div>
                        <div class="col-1-of-5">
                        SPECIAL OFFERS
                        </div>
                        <div class="col-1-of-5">
                        BUSINESS TRAVEL
                        </div>
                        <div class="col-1-of-5">
                        INFO &amp; SERVICES
                        </div>
                    </nav>
                </div>
            </section>
        </header>
        <main>
            <section id="carousel">
                <div class="row">
                    <img class="responsiveImage" alt="plane flying" src="images/mainpic.png"/>
                </div>
            </section>
            <section id="easy-blocks"> 
                <div class="wrapper">
                    <div class="row">
                        <div class="col-1-of-5">
                            <div class="row">
                                <img class="icons" alt="seat booking icon" src="images/seats.png"/>
                            </div>
                            <div class="row">
                                <p>SEAT BOOKING</p>
                            </div>
                        </div>
                        <div class="col-1-of-5">
                            <div class="row">
                                <img class="icons" alt="seat booking icon" src="images/suitcase.png"/>
                            </div>
                            <div class="row">
                                <p>BAGGAGE INFO</p>
                            </div>
                        </div>
                        <div class="col-1-of-5">
                            <div class="row">
                                <img class="icons" alt="seat booking icon" src="images/checkin.png"/>
                            </div>
                            <div class="row">
                                <p>EARLY CHECK-IN</p>
                            </div>
                        </div>
                        <div class="col-1-of-5">
                            <div class="row">
                                <img class="icons" alt="seat booking icon" src="images/cutlery.png"/>
                            </div>
                            <div class="row">
                                <p>MEAL OPTIONS</p>
                            </div>
                        </div>
                        <div class="col-1-of-5">
                            <div class="row">
                                <img class="icons" alt="seat booking icon" src="images/gamepad.png"/>
                            </div>
                            <div class="row">
                                <p>CONTESTS</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1-of-5">
                            <div class="row">
                                <img class="icons" alt="seat booking icon" src="images/cup.png"/>
                            </div>
                            <div class="row">
                                <p>REWARD POINTS</p>
                            </div>
                        </div>
                        <div class="col-1-of-5">
                            <div class="row">
                                <img class="icons" alt="seat booking icon" src="images/gift.png"/>
                            </div>
                            <div class="row">
                                <p>GIFT SHOP</p>
                            </div>
                        </div>
                        <div class="col-1-of-5">
                            <div class="row">
                                <img class="icons" alt="seat booking icon" src="images/parking.png"/>
                            </div>
                            <div class="row">
                                <p>PAY PARKING</p>
                            </div>
                        </div>
                        <div class="col-1-of-5">
                            <div class="row">
                                <img class="icons" alt="seat booking icon" src="images/map.png"/>
                            </div>
                            <div class="row">
                                <p>AIRPORT MAPS</p>
                            </div>
                        </div>
                        <div class="col-1-of-5">
                            <div class="row">
                                <img class="icons" alt="seat booking icon" src="images/hotel.png"/>
                            </div>
                            <div class="row">
                                <p>HOTEL BOOKINGS</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="block-wrapper">
                <div class="wrapper">
                    <div id="mainBlock" class="row">
                        <div class="col-8">
                            <div id="mobileOnly" class="row">
                                <div id="bookOnline" class="col-6 redLabel">
                                    <p>BOOK ONLINE</p>
                                </div>
                                <div id="flightSched" class="col-6 blueLabel">
                                    <p>SCHEDULES</p>
                                </div>
                            </div>
                            <div id="tabs" class="row">
                                <div id="onlineBook" class="col-6 redLabel">
                                    <p>BOOK ONLINE</p>
                                </div>
                                <div id="schedules" class="col-6 blueLabel">
                                    <p>SCHEDULES</p>
                                </div>
                            </div>
                            <div id="basePanel" class="row">
                                <div id="actPanel" class="col-12">
                                    <form class="row">
                                        <div id="bookForm" class="col-12">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div id="innerForm" class="row">
                                                        <div class="col-4">
                                                            <p>FROM</p>
                                                        </div>
                                                        <div class="col-8">
                                                            <input id="departure" name="departure" type="text" placeholder="DEPARTURE"/>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <p>TO</p>
                                                        </div>
                                                        <div class="col-8">
                                                            <input id="departure" name="departure" type="text" placeholder="ARRIVAL" />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <p>DEPART</p>
                                                        </div>
                                                        <div class="col-7">
                                                            <input id="departure" name="departure" type="text" placeholder="SELECT DATE" />
                                                        </div>
                                                        <div class="col-1">
                                                            <span>
                                                                <i class="fa fa-calendar fa-2x red"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <p>RETURN</p>
                                                        </div>
                                                        <div class="col-7">
                                                            <input id="return" name="return" type="text" placeholder="SELECT DATE" />
                                                        </div>
                                                        <div class="col-1">
                                                            <span>
                                                                <i class="fa fa-calendar fa-2x red"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-10">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <p>CLASS</p>
                                                        </div>
                                                        <div class="col-3">
                                                            <select class="inputStyle">
                                                                <option>ECONOMY</option>
                                                                <option>BUSINESS</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-4">
                                                            <p>ADULTS</p>
                                                        </div>
                                                        <div class="col-3">
                                                            <select class="inputStyle">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                                <option>6</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-10">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <p>CHILDREN</p>
                                                        </div>
                                                        <div class="col-3">
                                                            <select class="inputStyle">
                                                                <option>0</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-4">
                                                            <p>INFANTS</p>
                                                        </div>
                                                        <div class="col-3">
                                                            <select class="inputStyle">
                                                                <option>0</option>
                                                                <option>1</option></select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div id="buttonBar" class="col-12">
                                                    <button id="searchBtn" name="searchBtn" type="submit">SEARCH</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <form id="schedForm" class="hidden">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div id="innerForm" class="row">
                                                        <div class="col-4">
                                                            <p>FROM</p>
                                                        </div>
                                                        <div class="col-8">
                                                            <input id="departure" name="departure" type="text" placeholder="DEPARTURE"/>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <p>TO</p>
                                                        </div>
                                                        <div class="col-8">
                                                            <input id="departure" name="departure" type="text" placeholder="ARRIVAL" />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <p>DEPART</p>
                                                        </div>
                                                        <div class="col-7">
                                                            <input id="departure" name="departure" type="text" placeholder="SELECT DATE" />
                                                        </div>
                                                        <div class="col-1">
                                                            <span>
                                                                <i class="fa fa-calendar fa-2x red"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <p>RETURN</p>
                                                        </div>
                                                        <div class="col-7">
                                                            <input id="return" name="return" type="text" placeholder="SELECT DATE" />
                                                        </div>
                                                        <div class="col-1">
                                                            <span>
                                                                <i class="fa fa-calendar fa-2x red"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div id="buttonBar" class="col-12">
                                                    <button id="searchBtn" name="searchBtn" type="submit">SEARCH</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div id="topBox" class="row">
                                <div id="alertBox" class="col-12">
                                    <div class="row redLabel">
                                        <p>ALERTS</p>
                                    </div>
                                    <div class="row blue">
                                        <div class="col-12">
                                            <div class="row">
                                                <p>Alert 1</p>
                                            </div>
                                            <div class="row alertText">
                                                <div class="col-12">
                                                    <p>20% off on the next flight to Ireland. Book Now!</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <p>Alert 2</p>
                                            </div>
                                            <div class="row alertText">
                                                <div class="col-12">
                                                    <p>Just In: All flights going to London have been delayed.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="bottomBox" class="col-12">
                                <div class="row redLabel">
                                   <p>FLIGHT TRACKER</p>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <img alt="track by flight icon" src="images/plane.png" class="smallIcon"/>
                                    </div>
                                    <div class="col-10">
                                        <p>TRACK BY FLIGHT</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <img alt="track by route icon" src="images/route.png" class="smallIcon"/>
                                    </div>
                                    <div class="col-10">
                                        <p>TRACK BY ROUTE</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <footer id="footer">
            <div class="wrapper">
                <section id="footer-links">
                    <div class="row">
                        <div class="col-4">
                            <div class="row">
                                <p>FOLLOW US</p>
                            </div>
                            <div class="row">
                                <ul class="footerLink">
                                    <li><a href="#">FACEBOOK</a></li>
                                    <li><a href="#">INSTAGRAM</a></li>
                                    <li><a href="#">TWITTER</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row">
                                <p>OUR COMPANY</p>
                            </div>
                            <div class="row">
                                <ul class="footerLink">
                                    <li><a href="#">ABOUT PHP AIRLINES</a></li>
                                    <li><a href="#">SITE MAP</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row">
                                <p>CUSTOMER SERVICES</p>
                            </div>
                            <div class="row">
                                <ul class="footerLink">
                                    <li><a href="#">CONTACT US</a></li>
                                    <li><a href="#">FAQ</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="copyrights">
                    <p>Copyrights &copy; 2016 PHP Airlines. All Rights Reserved.</p>
                </section>
            </div>
        </footer>
        <script type="text/javascript" src="js/index.js"></script>
    </body>
</html>