<template>
    <div class="box this">

        <div v-if="patient_aangemaakt" class="notification is-success">
            Uw aanmelding is succesvol binnengekomen.
        </div>
        
        <div v-if="patient_bestaat_al" class="notification is-info">
            Welkom terug!
        </div>

        <div v-if="crash" class="notification is-warning">
            Uw aanmelding is <strong>niet</strong> aangekomen. Probeer het later nog eens of neem contact met ons op.
        </div>

        <div v-if="fill_out_required_fields" class="notification is-warning">
            Vul alstublieft alle verplichte velden in.
        </div>

        
        <form v-if="niet_verzonden" method="post">

            <div class="tabs is-centered is-fullwidth">
                <ul>
                    <li v-bind:class="{'is-active': page_one}"><a v-on:click="one_select">Basisgegevens</a></li>
                    <li v-bind:class="{'is-active': page_two}"><a v-on:click="two_select">Contactgegevens</a></li>
                    <li v-bind:class="{'is-active': page_three}"><a v-on:click="three_select">Adresgegevens</a></li>
                    <li v-bind:class="{'is-active': page_four}"><a v-on:click="four_select">Overige gegevens</a></li>
                </ul>
            </div>

            <progress class="progress is-link" :value=current :max=max></progress>
        

            <transition name="fade">
                <div v-if="page_one" class="box page">

                    <h2 class="is-size-3">Basisgegevens</h2>

                    <div class="field column">
                        <label class="label">Aanhef</label>
                        <div class="control">
                            <label class="radio">
                                <input type="radio" value="man" v-model="info.geslacht">
                                De heer
                            </label>
                            <label class="radio">
                                <input type="radio" value="vrouw" v-model="info.geslacht">
                                Mevrouw
                            </label>
                        </div>
                    </div>

                    <div class="columns">

                        <div class="field column ">
                            <label class="label">Voorletters</label>
                            <div class="control">
                                <input v-model="info.voorletters" class="input" type="text">
                            </div>
                        </div>

                        <div class="field column">
                            <label class="label">Roepnaam</label>
                            <div class="control">
                                <input v-model="info.roepnaam" class="input" type="text">
                            </div>
                        </div>
                    
                    </div>

                    <div class="columns">
                    
                        <div class="field column">
                            <label class="label">Tussenvoegsel <span class="has-text-grey is-italic has-text-weight-light">- is optioneel</span></label>
                            <div class="control">
                                <input v-model="info.voorvoegsel" class="input" type="text">
                            </div>
                        </div>

                        <div class="field column">
                            <label class="label">Geboortenaam</label>
                            <div class="control">
                                <input v-model="info.geboortenaam" class="input" type="text" placeholder="Vul hier je meisjesnaam of achternaam in">
                            </div>
                        </div>
                    
                    </div>

                    <div class="field">
                        <label class="label">Geboortedatum</label>
                        <div class="control">
                            <input v-model="info.geboortedatum" class="input" type="date">
                        </div>
                    </div>

                    <div class="columns">

                        <div class="field column">
                            <label class="label">Ben je een twee- of meerling?</label>
                            <div class="select">
                                <select v-model="info.meerling">
                                    <option>Ja</option>
                                    <option selected>Nee</option>
                                    <option>Onbekend</option>
                                </select>
                            </div>
                        </div>

                        <div class="file field column box" style="margin-top: 0.5em">
                            <label class="file-label">
                                <input class="file-input" type="file" accept="image/*" v-on:change="loadFile">
                                <span class="file-cta">
                                    <span class="file-icon">
                                        <i class="fas fa-upload"></i>
                                    </span>
                                    <span class="file-label">
                                        Kies een foto
                                    </span>
                                </span>
                            </label>
                            <img class="image" style="margin-top: 0.5em; border-radius: 20px;" id="output"/>
                        </div>
                    
                    </div>

                    <div class="field">
                        <label class="checkbox">
                            <input v-model="partner_ja" type="checkbox">
                            Heb je een partner?
                        </label>
                    </div>

                    <div v-if="partner_ja" class="columns">

                        <div class="field column">
                            <label class="label">Voorvoegsel <span class="has-text-grey is-italic has-text-weight-light">- is optioneel</span></label>
                            <div class="control">
                                <input v-model="info.voorvoegsel_partnernaam" class="input" type="text" placeholder="Voorvoegsel van je partner">
                            </div>
                        </div>

                        <div class="field column">
                            <label class="label">Partnernaam</label>
                            <div class="control">
                                <input v-model="info.partnernaam" class="input" type="text" placeholder="Achternaam van je partner">
                            </div>
                        </div>

                    </div>

                    <div class="this-buttons">
                        <div></div>
                        <a class="button is-link" v-on:click="one_next">Naar contactgegevens</a>
                    </div>

                </div>
            </transition>

            <transition name="fade">
                <div v-if="page_two" class="box page">

                    <h2 class="is-size-3">Contactgegevens</h2>

                    <div class="columns">

                        <div class="field column">
                            <label class="label">Telefoonnummer <span class="has-text-grey is-italic has-text-weight-light">- is optioneel</span></label>
                            <div class="control">
                                <input v-model="info.telefoon" class="input" type="tel">
                            </div>
                        </div>

                        <div class="field column">
                            <label class="label">Mobiel nummer</label>
                            <div class="control">
                                <input v-model="info.mobiel" class="input" type="tel">
                            </div>
                        </div>

                    </div>

                    <div class="field">
                        <label class="label">E-mail</label>
                        <div class="control">
                            <input v-model="info.email" class="input" type="email">
                        </div>
                    </div>

                    <div class="this-buttons">
                        <a class="button" v-on:click="two_previous">Terug</a>
                        <a class="button is-link" v-on:click="two_next">Naar adresgegevens</a>
                    </div>

                </div>
            </transition>

            <transition name="fade">
                <div v-if="page_three" class="box page">

                    <h2 class="is-size-3">Adresgegevens</h2>

                    <div class="columns">

                        <div class="field column is-half">
                            <label class="label">Postcode</label>
                            <div class="control">
                                <input v-on:blur="complete_address" v-model="info.postcode" class="input" type="text">
                            </div>
                        </div>

                        <div class="field column">
                            <label class="label">Huisnummer</label>
                            <div class="control">
                                <input v-on:blur="complete_address" v-model="info.huisnummer" class="input" type="text">
                            </div>
                        </div>

                        <div class="field column">
                            <label class="label">Toevoeging</label>
                            <div class="control">
                                <input v-model="info.toevoeging" class="input" type="text">
                            </div>
                        </div>

                    </div>

                    <div class="columns">

                        <div class="field column">
                            <label class="label">Woonplaats</label>
                            <div class="control">
                                <input v-bind:class="{'is-loading': ca_load}" v-model="info.woonplaats" class="input" disabled type="text">
                            </div>
                        </div>

                        <div class="field column">
                            <label class="label">Straatnaam</label>
                            <div class="control">
                                <input v-bind:class="{'is-loading': ca_load}" v-model="info.straatnaam" class="input" disabled type="text">
                            </div>
                        </div>
                    
                    </div>

                    <div class="field">
                        <label class="label">Land</label>
                        <div class="control">
                            <input v-bind:class="{'is-loading': ca_load}" v-model="info.land" class="input" disabled type="text">
                        </div>
                    </div>

                    <div class="field">
                        <label class="checkbox">
                            <input v-model="correspondentie_ja" type="checkbox">
                            Afwijkend adres voor correspondentie
                        </label>
                    </div>

                    <div v-if="correspondentie_ja" class="box">

                        <h2 class="is-size-3">Correspondentieadres</h2>

                        <div class="columns">

                            <div class="field column is-half">
                                <label class="label">Postcode</label>
                                <div class="control">
                                    <input v-model="info.cor_postcode" class="input" type="text">
                                </div>
                            </div>

                            <div class="field column">
                                <label class="label">Huisnummer</label>
                                <div class="control">
                                    <input v-model="info.cor_huisnummer" class="input" type="text">
                                </div>
                            </div>

                            <div class="field column">
                                <label class="label">Toevoeging</label>
                                <div class="control">
                                    <input v-model="info.cor_toevoeging" class="input" type="text">
                                </div>
                            </div>

                        </div>

                        <div class="columns">

                            <div class="field column">
                                <label class="label">Woonplaats</label>
                                <div class="control">
                                    <input v-model="info.cor_woonplaats" class="input" type="text">
                                </div>
                            </div>

                            <div class="field column">
                                <label class="label">Straatnaam</label>
                                <div class="control">
                                    <input v-model="info.cor_straatnaam" class="input" type="text">
                                </div>
                            </div>
                        
                        </div>

                        <div class="field">
                            <label class="label">Land</label>
                            <div class="control">
                                <input v-model="info.cor_land" class="input" type="text">
                            </div>
                        </div>

                    </div>

                    <div class="this-buttons">
                        <a class="button" v-on:click="three_previous">Terug</a>
                        <a class="button is-link" v-on:click="three_next">Naar overige gegevens</a>
                    </div>
                
                </div>
            </transition>

            <transition name="fade">
                <div v-if="page_four" class="box page">

                    <h2 class="is-size-3">Zorggegevens</h2>

                    <div class="field">
                        <label class="label">Patientnummer <span class="has-text-grey is-italic has-text-weight-light">- is optioneel</span></label>
                        <div class="control">
                            <input v-model="info.patientnummer" class="input" type="text">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Huisarts <span class="has-text-grey is-italic has-text-weight-light">- is optioneel</span></label>
                        <div class="control">
                            <input v-model="info.huisarts" class="input" type="text">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Tandarts <span class="has-text-grey is-italic has-text-weight-light">- is optioneel</span></label>
                        <div class="control">
                            <input v-model="info.tandarts" class="input" type="text">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Apotheek <span class="has-text-grey is-italic has-text-weight-light">- is optioneel</span></label>
                        <div class="control">
                            <input v-model="info.apotheek" class="input" type="text">
                        </div>
                    </div>

                    <div class="field">
                        <label class="checkbox">
                            <input v-model="info.toestemming_ophalen_gegevens" type="checkbox">
                            Ik geef toestemming om mijn medische gegevens op te halen bij mijn ziekenhuis of huisarts, dit is optioneel.
                        </label>
                    </div>

                    <div class="field">
                        <label class="checkbox">
                            <input v-model="info.akkoord_privacy_policy" type="checkbox">
                            Ik ga akkoord met de <a class="is-link">privacy policy</a> van UMC Utrecht.
                        </label>
                    </div>

                    <div class="this-buttons">
                        <a class="button" v-on:click="four_previous">Terug</a>
                        <a v-on:click="send" class="button is-link">Verzenden</a>
                    </div>

                </div>
            </transition>
                
        </form>

        <div v-if="testing" class="box test">
            <a v-on:click="fill" class="button">TEST: Vul formulier in</a><br>
            <label>TEST: stub toggle <input v-model="stub" type="checkbox"></label>
        </div>

    </div>
</template>

<script>
export default {
  name: 'umc-form',
  data () {
    return {
        info: {
            voorletters: '',
            roepnaam: '',
            voorvoegsel: '',
            geboortenaam: '',
            geboortedatum: '',
            geslacht: '',
            meerling: 'Nee',
            partnernaam: '',
            voorvoegsel_partnernaam: '',

            telefoon: '',
            mobiel: '',
            email: '',

            woonplaats: '',
            straatnaam: '',
            postcode: '',
            huisnummer: null,
            toevoeging: '',
            land: '',

            cor_woonplaats: '',
            cor_straatnaam: '',
            cor_postcode: '',
            cor_huisnummer: null,
            cor_toevoeging: '',
            cor_land: '',

            foto: '',
            patientnummer: null,
            correspondentie_adres: '',
            huisarts: '',
            tandarts: '',
            apotheek: '',
            toestemming_ophalen_gegevens: false,
            akkoord_privacy_policy: false,

        },
        correspondentie_ja: false,
        patient_aangemaakt: false,
        patient_bestaat_al: false,
        crash: false,
        niet_verzonden: true,
        fill_out_required_fields: false,

        current: 0,
        max: 3,
        page_one: true,
        page_two: false,
        page_three: false,
        page_four: false,

        stub: false,
        testing: false,
        ca_load: false,
        partner_ja: false,
        
        page_not_done: false,
    }
  },
  methods: {
    send() {
        window.scrollTo(0,0)
        var xhttp = new XMLHttpRequest()
        self = this
        xhttp.onreadystatechange = function(){
            self.niet_verzonden = false
            self.patient_aangemaakt = false
            self.patient_bestaat_al = false
            self.fill_out_required_fields = false
            self.crash = false
            if(xhttp.readyState === XMLHttpRequest.DONE && xhttp.status == 200){
                console.log(xhttp.response)
                if(xhttp.response.indexOf('Patient aangemaakt') !== -1){
                    self.patient_aangemaakt = true
                }
                else if(xhttp.response.indexOf('Patient staat al in het systeem') !== -1){
                    self.patient_bestaat_al = true
                }
                else if (xhttp.response.indexOf('Please fill out all required fields') !== -1){
                    self.fill_out_required_fields = true
                    self.niet_verzonden = true
                }
                else {
                    self.crash = true
                }
            }
            else if (xhttp.readyState === XMLHttpRequest.DONE) {
                self.crash = true
            }
        }
        xhttp.open('POST', '/backend/patient/create.php', true)
        xhttp.setRequestHeader("Content-Type", "application/json")
        xhttp.send(JSON.stringify(this.info))
    },
    loadFile(event){
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    },
    fill() {
        this.info.voorletters = 'AT'
        this.info.roepnaam = 'Adriaan'
        this.info.geboortenaam = 'Georgetina'
        this.info.geboortedatum = '04-04-1979'
        this.info.geslacht = 'man'
        this.info.meerling = 'Nee'
        this.info.partnernaam = 'Laan'
        this.info.voorvoegsel_partnernaam = 'van der'
        this.info.telefoon = '0031481635412'
        this.info.mobiel = '0610342567'
        this.info.email = 'ageorgetina@example.com'
        this.info.woonplaats = 'Rotterdam'
        this.info.postcode = '8723KD'
        this.info.huisnummer = 93
        this.info.toevoeging = 'a'
        this.info.land = 'Nederland'
        this.info.patientnummer = '19845987'
        this.info.huisarts = 'Huisartsenpraktijk Fanta'
        this.info.tandarts = 'Cisco Tandheelkunde'
        this.info.apotheek = 'Apotheek Chaudfontaine'
        this.info.toestemming_ophalen_gegevens = true
        this.info.akkoord_privacy_policy = true
    },
    complete_address() {
        this.ca_load = true
        if(this.info.postcode === '' || this.info.huisnummer === '' || !this.info.huisnummer.match(/^\d+$/) || !this.info.postcode.match(/^\d{4}\w{2}$/)){
            return
        }
        var url = '/backend/completeaddress.php?postcode=X_P&number=X_N'
        var url = url.replace('X_P', this.info.postcode.toUpperCase()).replace('X_N', this.info.huisnummer)
        var xhttp = new XMLHttpRequest()
        var self = this
        xhttp.onreadystatechange = function(){
            if(xhttp.readyState === XMLHttpRequest.DONE && xhttp.status == 200){
                var jsonresponse = JSON.parse(xhttp.response)
                self.info.woonplaats = jsonresponse._embedded.addresses[0].city.label
                self.info.straatnaam = jsonresponse._embedded.addresses[0].street
            }
            else if (xhttp.readyState === XMLHttpRequest.DONE){
                console.log('not successful')
            }
        }
        if(this.stub){
            this.info.woonplaats = "Utrecht"
            this.info.straatnaam = "Kerkstraat"
        }
        else {
            xhttp.open('GET', url)
            xhttp.send()
        }
        this.info.land = "Nederland"
        this.ca_load = false
    },
    page_done(){
        var page = this.current + 1
        if(page == 1){
            if(this.info.geslacht == '' || this.info.roepnaam == '' || this.info.geboortenaam == '' || this.info.geboortedatum == ''){
                window.scrollTo(0,0)
                return false
            }
            else {
                return true
            }
        }
        if(page == 2){
            if(this.info.mobiel == '' || this.info.email == ''){
                window.scrollTo(0,0)
                return false
            }
            else {
                return true
            }
        }
        if(page == 3){
            if(this.info.postcode == '' || this.info.huisnummer == '' ){
                window.scrollTo(0,0)
                return false
            }
            else {
                return true
            }
        }
    },
    one_next() {
        this.fill_out_required_fields = false
        var done = this.page_done()
        if(done){
            this.page_one = false
            this.page_two = true
            this.current++
        }
        else {
            this.fill_out_required_fields = true
        }
    },
    two_next() {
        this.fill_out_required_fields = false
        var done = this.page_done()
        if(done){
            this.page_two = false
            this.page_three = true
            this.current++
        }
        else {
            this.fill_out_required_fields = true
        }
    },
    three_next() {
        this.fill_out_required_fields = false
        var done = this.page_done()
        if(done){
            this.page_three = false
            this.page_four = true
            this.current++
        }
        else {
            this.fill_out_required_fields = true
        }
    },
    two_previous() {
        window.scrollTo(0,0)
        this.fill_out_required_fields = false
        this.page_two = false
        this.page_one = true
        this.current--
    },
    three_previous() {
        window.scrollTo(0,0)
        this.fill_out_required_fields = false
        this.page_three = false
        this.page_two = true
        this.current--
    },
    four_previous() {
        window.scrollTo(0,0)
        this.fill_out_required_fields = false
        this.page_four = false
        this.page_three = true
        this.current--
    },
    one_select() {
        if(1 > this.current){
            var done = this.page_done()
            this.fill_out_required_fields = false
            if(!done){
                this.fill_out_required_fields = true
                return
            }
        }
        this.page_one = true
        this.page_two = false
        this.page_three = false
        this.page_four = false
        this.current = 0
    },
    two_select() {
        if(2 > this.current){
            var done = this.page_done()
            this.fill_out_required_fields = false
            if(!done){
                this.fill_out_required_fields = true
                return
            }
        }
        this.page_one = false
        this.page_two = true
        this.page_three = false
        this.page_four = false
        this.current = 1
    },
    three_select() {
        if(3 > this.current){
            var done = this.page_done()
            this.fill_out_required_fields = false
            if(!done){
                this.fill_out_required_fields = true
                return
            }
        }
        this.page_one = false
        this.page_two = false
        this.page_three = true
        this.page_four = false
        this.current = 2
    },
    four_select() {
        if(4 > this.current){
            var done = this.page_done()
            this.fill_out_required_fields = false
            if(!done){
                this.fill_out_required_fields = true
                return
            }
        }
        this.page_one = false
        this.page_two = false
        this.page_three = false
        this.page_four = true
        this.current = 3
    },
  }
}
</script>

<style scoped>
.test {
    margin-top: 30em;
}
.this-buttons {
    display: flex;
    justify-content: space-between;
}
.fade-enter-active {
    transition: opacity .3s .3s;
}

.fade-leave-active {
    transition: opacity .3s;
}
.fade-enter {
    opacity: 0;
}
.fade-leave-to {
    opacity: 0;
}
.this {
    margin: 1em;
}
</style>
