<?php
//Template Name: Form Frontend
get_header();
?>
<div class="container">
    <div class="text">
        <span>Contact us Form</span>
    </div>
    <form id="myForm" action="#">
        <div class="form-row">
            <div class="input-data">
                <input type="text" id="name" name="name" required>
                <div class="underline"></div>
                <label for="name">Name</label>
            </div>
            <div class="input-data">
                <input type="text" id="phoneNumber" name="phoneNumber" required>
                <div class="underline"></div>
                <label for="phoneNumber">Phone number</label>
            </div>
        </div>
        <div class="form-row">
            <div class="input-data">
                <input type="email" id="email" name="email" required>
                <div class="underline"></div>
                <label for="email">Email Address</label>
            </div>
        </div>
        <div class="form-row">
            <div class="input-data textarea">
                <textarea rows="8" cols="80" id="message" name="message" required></textarea>
                <div class="underline"></div>
                <label for="message">Write your message</label>
            </div>
        </div>
        <div class="form-row submit-btn">
            <div class="input-data">
                <div class="inner"></div>
                <input type="submit" value="submit">
            </div>
        </div>
    </form>
    <div id="result"></div>
</div>
<?php get_footer(); ?>

