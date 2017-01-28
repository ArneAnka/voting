<template>
    <div class="game__voting">
        {{ up }} <a href="#" class="game__voting-button" @click.prevent="vote('up')">up</a> &nbsp;
        {{ down }} <a href="#" class="game__voting-button" @click.prevent="vote('down')">down</a> &nbsp;
        # comments
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                up: null,
                down: null,
                userVote: null,
                canVote: false
            }
        },
        mounted () {
            // console.log(this.gameSlug)
            // this.getVotes()
        },
        methods: {
            getVotes () {
                this.$http.get('/m/' + this.gameSlug + '/votes').then((response) => {
                    this.up = response.json().data.up;
                    this.down = response.json().data.down;
                    this.userVote = response.json().data.user_vote;
                    this.canVote = response.json().data.can_vote;
                }, (response) => {
                    // console.log('error')
                });
            },
            vote(type){
                if(this.userVote == type){
                    this[type]--;
                    this.userVote = null;
                    this.deleteVote(type);
                    return;
                }
                if(this.userVote){
                    this[type == 'up' ? 'down' : 'up']--;
                }
                this[type]++;
                this.userVote = type;
                this.createVote(type);
            },
            deleteVote(type){
                this.$http.delete('/m/' + this.gameSlug + '/votes');
            },
            createVote(type){
                this.$http.post('/m/' + this.gameSlug + '/votes',{
                    type:type
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
