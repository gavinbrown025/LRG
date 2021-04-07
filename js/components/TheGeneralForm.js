export default {

    name: 'TheGeneralForm',
    template: `

    <div id="general-form">
        <div class="contact-info">
          <h2>General Inqueries</h2>
          <p>Are you interested in becoming a member? Want to join our Junior Mentorship program? Or a general inquiry? Feel free to send us a message.<br><br>
            You will hear back from us within an amount of time. Are you interested in becoming a member? Want to join our Junior Mentorship program? Or a general inquiry? Feel free to send us a message.<br><br>
            Privacy information Are you interested in becoming a member? Want to join our Junior Mentorship program? Or a general inquiry? Feel free to send us a message.
          </p>
        </div>

        <div class="input-con">
          <input @change="$emit('inputchanged', $event)" type="text" name="name" id="name" required>
          <label for="name">Your Name</label>
        </div>

        <div class="input-con">
          <input @change="$emit('inputchanged', $event)" type="email" name="email" id="email" required>
          <label for="email">Email</label>
        </div>

        <div class="input-con">
          <textarea @change="$emit('inputchanged', $event)" id="message" name="message" required></textarea>
          <label for="message">Message</label>
        </div>

        <div class="submit-con">
          <button type="submit" class="cta-button">Send</button>
        </div>
    </div>

    `,

}
