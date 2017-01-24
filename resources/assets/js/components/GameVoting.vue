<template>
    <div class="game__voting">
        {{ up }} <a href="#" class="game__voting-button">up</a> &nbsp;
        {{ down }} <a href="#" class="game__voting-button">down</a> &nbsp;
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
            this.getVotes()
        },
        methods: {
            getVotes () {
                this.$http.get('/m/' + this.gameSlug + '/votes').then((response) => {
                    this.up = response.data.up;
                    this.down = response.data.down;
                    this.userVote = response.data.user_vote;
                    this.canVote = response.data.can_vote;
                }, (response) => {
                    // console.log('error')
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
