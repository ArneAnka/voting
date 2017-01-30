<template>
    <div class="game__voting">
        {{ up }} <a href="#" class="game__voting-button-up" v-bind:class="{'game__voting-button--voted-up': userVote == 'up'}" @click.prevent="vote('up')"><i class="fa fa-arrow-up" aria-hidden="true"></i></a> &nbsp;
        {{ down }} <a href="#" class="game__voting-button-down" v-bind:class="{'game__voting-button--voted-down': userVote == 'down'}" @click.prevent="vote('down')"><i class="fa fa-arrow-down" aria-hidden="true"></i></a> &nbsp;
        <i class="fa fa-comments" aria-hidden="true"></i> &nbsp; 
        <i class="fa fa-star" aria-hidden="true"></i>
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
