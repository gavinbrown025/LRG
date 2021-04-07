export default {

    name: 'TheJuniorForm',
    template: `
        <div id="junior-form">
            <div class="contact-info">
                <p>Prior to completing this application you must consider the following Required Commitments:
                    <br>A) Must be 14yrs as of Dec 31-2021
                    <br>B) Attend on ice evaluation
                    <br>C) Complete Alliance on-line Clinic
                    <br>D) Attend all day in class clinic - Sept
                    <br>E) Be prepared for Initial start up costs - price of clinic registration and required equipment including Black Helmet and Half Visor CSA - BNQ Neck Guard CSA - Authorized Ref Jersey - Acme Thunder Whistle(2) - Black Pants & Shin Tights - Protective Equipment - Elbow Pads - Shin Pads etc.
                    <br>F) Attend a minimum of 3 hrs of on ice Exhibition Training Games
                    <br>G) Attend Monthly Membership Meetings
                    <br>H) Be available one day every weekend to skate 2 or 3 games (Sept-March) . If you have any questions or comments please send to devprogram@londonrefereesgroup.com
                </p>
            </div>

            <div class="input-con">
                <label for="preamble">1. I Accept The Terms Above*</label>
                <div>
                    <input type="checkbox" value="yes" name="preamble" required>
                    yes
                </div>
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
                <label for="hockey">9. Are You Currently Playing Organized Hockey in Ontario *</label>
                <div id="hockey">
                    <input type="radio" name="hockey" value="yes" required>
                    Yes
                    <input type="radio" name="hockey" value="no" required>
                    No
                </div>
            </div>

            <div class="input-con">
                <label for="division">10. If Yes - Association and Division? *</label>
                <input @change="$emit('inputchanged', $event)" type="text" id="division" name="division" required>
            </div>

            <div class="input-con">
                <label for="work">11. Are You Currently Employed *</label>
                <div id="work">
                    <input type="radio" name="work" value="yes" required>
                    Yes
                    <input type="radio" name="work" value="no" required>
                    No
                </div>
            </div>

            <div class="input-con">
                <label for="reference">12. Would you like to provide a reference? *</label>
                <input @change="$emit('inputchanged', $event)" type="text" id="reference" name="reference" required>
            </div>

            <div class="input-con">
                <label for="freelance">13. I acknowledge as an official of LRG assigned games I am not an employee But I provide my services on a freelance basis *</label>
                <div id="freelance">
                    <input type="radio" name="freelance" value="yes" required>
                    Yes
                    <input type="radio" name="freelance" value="no" required>
                    No
                </div>
            </div>

            <div class="input-con">
                <label for="acknowledgment">I have read and understand the information above *</label>
                <div id="acknowledgment">
                    <input type="radio" name="acknowledgment" value="yes" required>
                    Yes
                    <input type="radio" name="acknowledgment" value="no" required>
                    No
                </div>
            </div>

            <div class="submit-con">
              <button type="submit" class="cta-button">Submit</button>
            </div>

        </div>
    `,
    methods: {

    }

}
