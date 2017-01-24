<template>
    <div>
		  <div class="game__listing" v-for="game in games">
		  	<a :href="game.slug">{{ game.title }}</a>
            <game-voting :game-slug="game.slug"></game-voting>
		  </div>
    </div>
</template>

<script>
    export default {
        props: {
            GamesList: null
        },
        data () {
            return {
			    games: this.GamesList,
		  }
    	},
        mounted () {
            // console.log(this.games)
        },
	}
</script>
