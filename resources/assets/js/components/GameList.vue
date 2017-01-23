<template>
    <div class="game__listing">
	    <ul id="games">
		  <li v-for="game in games">
		  	{{ game.title }}
		  </li>
	    </ul>
    </div>
</template>

<script>
    export default {
        props: {
            gamesList: null
        },
        data () {
            return {
			    games: null
		  }
    	},
	    mounted() {
	        console.log(this.gamesList);
	    }
}
</script>
