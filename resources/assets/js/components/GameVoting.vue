<template>
    <div class="game__voting">
        {{ up }} <a href="#" class="game__voting-button" @click.prevent="vote('up')">up</a> &nbsp;
        {{ down }} <a href="#" class="game__voting-button" @click.prevent="vote('down')">down</a> &nbsp;
        # comments
    </div>
</template>

<script>
    export default {
        name: 'unique-name-of-my-component',
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
            this.getVotes()
        },
        methods: {
            getVotes () {
                this.$http.get('/m/' + this.gameSlug + '/votes').then((response) => {
                    this.up = response.body.data.up;
                    this.down = response.body.data.down;
                    this.userVote = response.body.data.user_vote;
                    this.canVote = response.body.data.can_vote;
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
