export default {

    name: 'TheMemberForm',
    template: `
        <div id="member-form">
            <div class="contact-info">
                <h2>20-21 Referee Transfer In to London Referees Group</h2>
            </div>

            <div class="input-con">
                <label for="lastname">2. Last Name *</label>
                <input @change="$emit('inputchanged', $event)" type="text" id="lastname" name="lastname" required>
            </div>

            <div class="input-con">
                <label for="firstname">3. First Name *</label>
                <input @change="$emit('inputchanged', $event)" type="text" id="firstname" name="firstname" required>
            </div>

            <div class="input-con">
                <label for="birthdate">4. Date of Birth - dd/mm/yyyy *</label>
                <input @change="$emit('inputchanged', $event)" id="birthdate" name="birthdate" required>
            </div>

            <div class="input-con">
                <label for="email">5. E-Mail Address *</label>
                <input @change="$emit('inputchanged', $event)" type="email" id="email" name="email" required>
            </div>

             <div class="input-con">
                <label for="cellphone">6. Cell Phone Number - example:5195556666 *</label>
                <input @change="$emit('inputchanged', $event)" type="tel" minlength="10" maxlength="10" id="cellphone" name="cellphone" required>
            </div>
            <div class="input-con">
                <label for="address">8. Home Address - e.g. 123 Hockey st, London ON, A1B2C3 *</label>
                <input @change="$emit('inputchanged', $event)" type="text" id="address" name="address" required>
            </div>

            <div class="input-con">
                <label for="message">7. HCOP Level? Years of Experience? Referee Association? *</label>
                <textarea @change="$emit('inputchanged', $event)" id="message" name="message" required></textarea>
            </div>

            <div class="submit-con">
              <button type="submit" class="cta-button">Submit</button>
            </div>
        </div>
    `,
}
