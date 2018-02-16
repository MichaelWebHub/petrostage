<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="yandex-verification" content="65418e24e8d4b4ac" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="PetroStage">
    <meta property="og:title" content="PetroStage">
    <meta property="og:description" content="PetroStage is a free platform created in order to gather information about all SPE student events in one place. Any SPE student chapter which hosts an international event can inform fellow students about it by adding it to PetroStage database.">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <meta name="description" content="PetroStage is a free platform created in order to gather information about all SPE student events in one place. Any SPE student chapter which hosts an international event can inform fellow students about it by adding it to PetroStage database.">
    <meta charset="UTF-8">
        <link rel="icon" href="img/PS_logo_2.png">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
    <script src="script/jquery-3.1.1.js"></script>
    <script src="script/mansory.js"></script>
    <script src="script/script.js" async></script>
    <title> PetroStage </title>
</head>

<body>
<div class="turn-the-screen">
    <div class="turn-the-screen-img"></div>
</div>
<div class="container">
    <header class="header">
        <div class="header-logo">
            <a href="http://www.petrostage.org"> <img src="img/Petronoline.png" alt="SPE Connect"> </a>
        </div>
        <div class="header-controls">
            <ul class="header-controls-ul">
                <li class="header-controls-li">
                    <p class="controls-li-text show-all"> Show All </p>
                    <div class="controls-li-underline"></div>
                </li>
                <li class="header-controls-li">
                    <p class="controls-li-text"> <span class="header-controls-link"> About Us </span> </p>
                    <div class="controls-li-underline"></div>
                </li>
            </ul>
        </div>
        <div class="header-search">
            <div class="header-search-form">
                <form class="select-form" action="#">
                    <select name="months" class="header-search-select">
                        <option value="01"> January </option>
                        <option value="02"> February </option>
                        <option value="03"> March </option>
                        <option value="04"> April </option>
                        <option value="05"> May </option>
                        <option value="06"> June </option>
                        <option value="07"> July </option>
                        <option value="08"> August </option>
                        <option value="09"> September </option>
                        <option value="10"> October </option>
                        <option value="11"> November </option>
                        <option value="12"> December </option>
                    </select>
                </form>
                <form class="search-form" action="#">
                    <input class="header-search-input" type="text" autocomplete="off" placeholder="Find Event">
                </form>
            </div>
        </div>
    </header>
    <main class="main">
        <div class="main-grid"></div>
    </main>

    <div class="event-form hidden">
        <div class="event-form-close"> <i class="fa fa-times" aria-hidden="true"></i> </div>
        <form class="event-form-form" action="php/addevent.php" method='post'>
            <p class="form-row">
                <label class="event-form-label"> Title <sup class="required">*</sup> </label>
                <input type="text" class="event-title-input event-form-input" name="title" autofocus placeholder="Title" maxlength="130" required>
            </p>
            <p class="form-row">
                <label class="event-form-label"> Type <sup class="required">*</sup> </label>
                <select name="type" class="event-type-input event-form-input" required>
                    <option selected disabled class="hidden"> Select event type </option>
                    <option value="congress"> Congress </option>
                    <option value="conference"> Conference </option>
                    <option value="forum"> Forum </option>
                </select>
            </p>
            <p class="form-row">
                <label class="event-form-label"> Chapter <sup class="required">*</sup> </label>
                <input type="text" class="event-chapter-input event-form-input" name="chapter" placeholder="Chapter" maxlength="80" required>
            </p>
            <p class="form-row">
                <label class="event-form-label"> City <sup class="required">*</sup> </label>
                <input type="text" class="event-city-input event-form-input" name="city" placeholder="City" maxlength="80" required>
            </p>
            <p class="form-row clearfix">
                <label class="event-form-label"> Date<sup class="required">*</sup> </label>
                <input type="date" id="datepicker1" class="event-date-input event-date-start event-form-input" name="start-date" placeholder="Start date" required>
                <input type="date" id="datepicker2" class="event-date-input event-date-end event-form-input" name="end-date" placeholder="End date" required>
            </p>
            <p class="form-row">
                <label class="event-form-label"> Place <sup class="required">*</sup> </label>
                <input type="text" class="event-place-input event-form-input" placeholder="Place" name="place" maxlength="80" required>
            </p>
            <div class="form-row">
                <label class="event-form-label"> Description <sup class="required">*</sup> </label>
                <textarea class="event-description-input event-form-input" cols="30" rows="10" name="description" minlength="100" maxlength="400" required placeholder="Minimum 100 characters"></textarea>
                <p class="validate-textarea"> </p>
            </div>
            <p class="form-row">
                <label class="event-form-label"> Email <sup class="required">*</sup> </label>
                <input type="text" class="event-email-input event-form-input" placeholder="Email" name="email" maxlength="50" required>
            </p>
            <p class="form-row">
                <label class="event-form-label"> Website </label>
                <input type="text" class="event-website-input event-link-input event-form-input" placeholder="Website" name="website" maxlength="50">
            </p>
            <p class="form-row">
                <label class="event-form-label"> Facebook </label>
                <input type="text" class="event-facebook-input event-link-input event-form-input" placeholder="Facebook link" name="facebook" maxlength="100">
            </p>
            <p class="form-row">
                <label class="event-form-label"> VK </label>
                <input type="text" class="event-vk-input event-link-input event-form-input" placeholder="VK link" name="vk" maxlength="100">
            </p>
            <p class="form-row">
                <label class="event-form-label"> Instagram </label>
                <input type="text" class="event-instagram-input event-link-input event-form-input" placeholder="Instagram link" name="instagram" maxlength="100">
            </p>
            <p class="form-row clearfix">
                <input type="submit" value="Submit" class="event-form-submit" disabled>
            </p>
        </form>
    </div>
</div>
<script src="script/request.js" defer></script>
<script src="script/form.js" defer></script>
<script>
    AOS.init();
</script>
</body>

</html>
