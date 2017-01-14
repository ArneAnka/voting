<template>
    <div class="game__voting">
        <a href="#" class="video__voting-button">up</a> {{ up }} &nbsp;
        <a href="#" class="video__voting-button">down</a> {{ down }} &nbsp;
        comments #
    </div>
</template>

<script>
    export default {
        data () {
            return {
                up: null,
                down: null,
                userVote: null,
                canVote: false
            }
        },
        mounted () {
            // console.log(this.gameSlug)
        },
        methods: {
            getVotes () {
                this.$http.get('/m/' + this.gameSlug + '/votes').then((response) => {
                    this.up = response.json().data.up;
                    this.down = response.json().data.down;
                    this.userVote = response.json().data.user_vote;
                    this.canVote = response.json().data.can_vote;
                }, (response) => {
                    console.log('error')
                });
            }
        },
        props: {
            gameSlug: null,
        },
        ready () {
            this.getVotes()
        }
    }
</script>
