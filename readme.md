# Laravel PHP Framework Simple Databse with voting and comments
Trying to build a NES and SNES comment and voting system. But cant really get things to work.. :(

# Install
```sh
$ npm install
$ gulp
```
And ofc set up your `.env` file

# Problems
1. ~~Up and down votes doesn't appear under Title.~~
2. When commenting, with validation, errors appear on all divs, should appear on that specefic comment.
3. Total amount of comments for a Game title doesn't appear.
4. ~~"/l" route shouldent exist. When just hitting "/m", all games should appear~~
5. ~~Searching when browsing comments should go to "/l/all" (or /m/all) (removed searchbar in comments)~~
6. Be able to vote up and down on comments.
7. Clean up a VoteTrait (one common vote model and Controller).
8. Add CommentCount and Votes (ups/downs) to collection $game to avoid a $http.get request for all titles (GameVoting.vue).
9. Favorite games, adding them to a user specefic list.
10. User interface, http://example.com/@user view comments, likes and favorite games.
10. Everything should be Vuejs =)