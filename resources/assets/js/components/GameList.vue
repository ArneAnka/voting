<template> <!-- https://jsfiddle.net/zxm7oL36/ -->
    <div>
	  <div class="game__listing" v-for="game in games">
	  	<h3 style="margin-bottom: 3px;"><a :href="game.slug">{{ game.title }}</a></h3>
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
