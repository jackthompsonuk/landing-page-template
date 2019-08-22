<div class="contact" id="contact">

    <form method="post" class="enquiryForm js-enquiryForm">
        <div class="enquiryForm__field nameField">
            <input type="text" name="name" id="name" required>
            <label for="name">Name</label>
        </div>
        <div class="enquiryForm__field phoneField">
            <input type="text" name="phone" id="phone" pattern="[0-9]*" inputmode="numeric" required>
            <label for="phone">Phone Number</label>
        </div>
        <div class="enquiryForm__button">
            <button class="button--fullWidth" type="submit">Get a Callback</button>
        </div>
        <input type="hidden" name="__formName" value="Callback Request">
    </form>

    <div class="formSuccessMessage js-formSuccess" style="display:none">
        <p>Your callback has been requested</p>
    </div>

</div>