<style>

/* =========================
   NAVBAR (LEBIH RAMPING)
========================= */

.custom-navbar{
    background: linear-gradient(
        135deg,
        #0f172a,
        #1e3a8a
    );

    padding-top: 6px;
    padding-bottom: 6px;

    min-height: 68px;
}



/* =========================
   BRAND
========================= */

.navbar-brand{

    padding: 0;

    display: flex;

    align-items: center;

}



/* =========================
   RUNNING TEXT
========================= */

.running-text{

    width: 180px;

    overflow: hidden;

    white-space: nowrap;

    position: relative;

    line-height: 1.1;

}


.running-text span{

    display: inline-block;

    padding-left: 100%;

    animation:
        runningText
        12s
        linear
        infinite;

    color: #fff;

    font-size: 14px;

    font-weight: 700;

    text-shadow:
        0 0 8px
        rgba(
            255,
            255,
            255,
            .4
        );

}


@keyframes runningText{

0%{

transform:
translateX(0);

}

100%{

transform:
translateX(-100%);

}

}



/* =========================
   SUBTITLE
========================= */

.navbar-brand small{

    font-size: 10px;

    display: block;

    opacity: .8;

}



/* =========================
   MENU
========================= */

.navbar .nav-link{

    color:
    rgba(
        255,
        255,
        255,
        .88
    ) !important;

    padding:
        8px
        12px;

    font-size:
        14px;

    transition:
        .25s;

}


.navbar .nav-link:hover{

    color:
    #facc15 !important;

    transform:
    translateY(-1px);

}



/* =========================
   LOGIN
========================= */

.btn-login{

    background:
    #facc15;

    color:
    #111827;

    border-radius:
    10px;

    padding:
        7px
        18px;

    font-size:
        13px;

    transition:
        .25s;

}


.btn-login:hover{

background:
#fde047;

transform:
translateY(-1px);

}



/* =========================
   MOBILE
========================= */

@media(max-width:768px){

.custom-navbar{

padding-top:8px;

padding-bottom:8px;

}


.running-text{

width:150px;

}


.running-text span{

font-size:12px;

}


.navbar .nav-link{

padding:8px;

}


.btn-login{

width:100%;

margin-top:8px;

}

}

</style>



<nav
class="navbar navbar-expand-lg navbar-dark shadow-sm custom-navbar">

<div class="container">




<a
class="navbar-brand fw-bold d-flex align-items-center"
href="/">

<i
class="fas fa-tools me-2 text-warning"
style="font-size:22px;">
</i>


<div>

<div
class="running-text">

<span>

🔥 SEWA ALAT UKK •
APLIKASI PEMINJAMAN ALAT •
LARAVEL 13 •
UKK RPL 2025/2026 •

</span>

</div>



</div>

</a>




<button
class="navbar-toggler"
type="button"
data-bs-toggle="collapse"
data-bs-target="#navbarNav">

<span
class="navbar-toggler-icon">
</span>

</button>




<div
class="collapse navbar-collapse"
id="navbarNav">

<ul
class="navbar-nav ms-auto align-items-lg-center">


<li class="nav-item">

<a
class="nav-link"
href="/">

<i class="fas fa-home me-1"></i>

Home

</a>

</li>



<li class="nav-item">

<a
class="nav-link"
href="/fitur">

<i class="fas fa-list me-1"></i>

Fitur

</a>

</li>



<li class="nav-item">

<a
class="nav-link"
href="/tentang">

<i class="fas fa-info-circle me-1"></i>

Tentang

</a>

</li>



<li class="nav-item">

<a
class="nav-link"
href="/kontak">

<i class="fas fa-phone-alt me-1"></i>

Kontak

</a>

</li>



<li
class="nav-item ms-lg-2">

<a
href="/login"
class="btn btn-login fw-bold">

<i
class="fas fa-sign-in-alt me-2">
</i>

Login

</a>

</li>

</ul>

</div>

</div>

</nav>