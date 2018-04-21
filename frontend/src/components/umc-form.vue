<template>
    <form method="post">

        <div class="field">
            <label class="label">Voorletters</label>
            <div class="control">
                <input v-model="info.voorletters" class="input" type="text" placeholder="Voorletters">
            </div>
        </div>

        <div class="field">
            <label class="label">Roepnaam</label>
            <div class="control">
                <input v-model="info.roepnaam" class="input" type="text" placeholder="Roepnaam">
            </div>
        </div>

        <div class="field">
            <label class="label">Tussenvoegsel</label>
            <div class="control">
                <input v-model="info.voorvoegsel" class="input" type="text" placeholder="Tussenvoegsel">
            </div>
        </div>

        <div class="field">
            <label class="label">Geboortenaam</label>
            <div class="control">
                <input v-model="info.geboortenaam" class="input" type="text" placeholder="Geboortenaam">
            </div>
        </div>

        <div class="field">
            <label class="label">Geboortedatum</label>
            <div class="control">
                <input v-model="info.geboortedatum" class="input" type="date">
            </div>
        </div>

        <div class="field">
            <label class="label">Geslacht</label>
            <div class="control">
                <label class="radio">
                    <input type="radio" value="man" v-model="info.geslacht">
                    Man
                </label>
                <label class="radio">
                    <input type="radio" value="vrouw" v-model="info.geslacht">
                    Vrouw
                </label>
            </div>
        </div>

        <div class="field">
            <label class="label">Meerling</label>
            <div class="select">
                <select v-model="info.meerling">
                    <option>Ja</option>
                    <option selected>Nee</option>
                    <option>Onbekend</option>
                </select>
            </div>
        </div>

        <div class="field">
            <label class="label">Partnernaam</label>
            <div class="control">
                <input v-model="info.partnernaam" class="input" type="text" placeholder="Partnernaam">
            </div>
        </div>

        <div class="field">
            <label class="label">Voorvoegsel</label>
            <div class="control">
                <input v-model="info.voorvoegsel_partnernaam" class="input" type="text" placeholder="Voorvoegsel">
            </div>
        </div>

        <div class="field">
            <label class="label">Telefoonnummer</label>
            <div class="control">
                <input v-model="info.telefoon" class="input" type="tel">
            </div>
        </div>

        <div class="field">
            <label class="label">Mobiel nummer</label>
            <div class="control">
                <input v-model="info.mobiel" class="input" type="tel">
            </div>
        </div>

        <div class="field">
            <label class="label">Email</label>
            <div class="control">
                <input v-model="info.email" class="input" type="email">
            </div>
        </div>

        <div class="field">
            <label class="label">Woonplaats</label>
            <div class="control">
                <input v-model="info.woonplaats" class="input" type="text" placeholder="Woonplaats">
            </div>
        </div>

        <div class="field">
            <label class="label">Postcode</label>
            <div class="control">
                <input v-model="info.postcode" class="input" type="text" placeholder="Postcode">
            </div>
        </div>

        <div class="field">
            <label class="label">Huisnummer</label>
            <div class="control">
                <input v-model="info.huisnummer" class="input" type="text" placeholder="Huisnummer">
            </div>
        </div>

        <div class="field">
            <label class="label">Toevoeging</label>
            <div class="control">
                <input v-model="info.toevoeging" class="input" type="text" placeholder="Toevoeging">
            </div>
        </div>

        <div class="field">
            <label class="label">Land</label>
            <div class="control">
                <input v-model="info.land" class="input" type="text" placeholder="Land">
            </div>
        </div>

        <div class="file">
            <label class="file-label">
                <input class="file-input" type="file">
                <span class="file-cta">
                    <span class="file-icon">
                        <i class="fas fa-upload"></i>
                    </span>
                    <span class="file-label">
                        Kies een foto
                    </span>
                </span>
            </label>
        </div>

        <div class="field">
            <label class="label">Patientnummer</label>
            <div class="control">
                <input v-model="info.patientnummer" class="input" type="text" placeholder="Patientnummer">
            </div>
        </div>

        <div class="field">
            <label class="label">Correspondentie adres</label>
            <div class="control">
                <input v-model="info.correspondentie_adres" class="input" type="text" placeholder="Correspondentie adres">
            </div>
        </div>

        <div class="field">
            <label class="label">Huisarts</label>
            <div class="control">
                <input v-model="info.huisarts" class="input" type="text" placeholder="Huisarts">
            </div>
        </div>

        <div class="field">
            <label class="label">Tandarts</label>
            <div class="control">
                <input v-model="info.tandarts" class="input" type="text" placeholder="Tandarts">
            </div>
        </div>

        <div class="field">
            <label class="label">Apotheek</label>
            <div class="control">
                <input v-model="info.apotheek" class="input" type="text" placeholder="Apotheek">
            </div>
        </div>

        <div class="field">
            <label class="checkbox">
                <input v-model="info.toestemming_ophalen_gegevens" type="checkbox">
                Toestemming ophalen gegevens
            </label>
        </div>

        <div class="field">
            <label class="checkbox">
                <input v-model="info.akkoord_privacy_policy" type="checkbox">
                Akkoord privacy policy
            </label>
        </div>

        <a v-on:click="send" class="button">Verzenden</a>
        <a v-on:click="fill" class="button">Vul formulier in</a>
    </form>
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
            postcode: '',
            huisnummer: null,
            toevoeging: '',
            land: '',
            foto: '',
            patientnummer: null,
            correspondentie_adres: '',
            huisarts: '',
            tandarts: '',
            apotheek: '',
            toestemming_ophalen_gegevens: false,
            akkoord_privacy_policy: false
        }
    }
  },
  methods: {
    send() {
        var xhttp = new XMLHttpRequest()
        xhttp.onreadystatechange = function(){
            if(xhttp.readyState === XMLHttpRequest.DONE && xhttp.status == 200){
                console.log('successful!')
            }
            else {
                console.log('not successful')
            }
        }
        xhttp.open('POST', '/backend/patient/create.php', true)
        xhttp.setRequestHeader("Content-Type", "application/json")
        xhttp.send(JSON.stringify(this.info))
    },
    fill() {
        this.info.voorletters = 'AT'
        this.info.roepnaam = 'Adriaan'
        this.info.voorvoegsel = ''
        this.info.geboortenaam = 'Georgetina'
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

    }
  }
}
</script>

<style scoped>

</style>
