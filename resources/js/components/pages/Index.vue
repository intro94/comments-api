<template>
    <div class="container">
        <div class="section">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
        <div class="columns reverse-columns has-text-right">
            <div class="column is-two-fifths">
                <button class="button" @click="$store.dispatch('setReplyId', 0)">Leave comment</button>
            </div>
        </div>
        <div v-if="replyId === 0" class="columns">
            <article class="column media">
                <form @submit.prevent="addComment(0)" class="media-content">
                    <div class="field">
                        <p class="control">
                            <label>
                                <textarea v-model="replyCommentText" class="textarea" placeholder="Add a comment..."/>
                            </label>
                        </p>
                    </div>
                    <nav class="level is-mobile">
                        <div class="level-left">
                            <div class="level-item">
                                <button type="button" class="button is-outlined" @click="resetReply">Cancel</button>
                            </div>
                            <div class="level-item">
                                <button type="submit" class="button is-dark">Submit</button>
                            </div>
                        </div>
                    </nav>
                </form>
            </article>
        </div>
        <div class="container content-tree">
            <div v-if="noComments" class="columns has-text-centered">
                <div class="column">
                    <h4 class="subtitle is-4">No Comments</h4>
                </div>
            </div>

            <CommentItem
                v-for="(item, index) in getCommentsGroup(0)"
                :item="item"
                :index="index"
                :key="item.id"
            />
        </div>
    </div>
</template>

<script>
    import CommentItem from "../helpers/CommentItem";

    export default {
        name: "Index",
        data() {
            return {
                noComments: false,
                replyCommentText: ''
            }
        },
        computed: {
            commentList: function () {
                return this.$store.getters.getCommentList;
            },
            replyId: function () {
                return this.$store.getters.getReplyId;
            }
        },
        methods: {
            getCommentsGroup: function (id) {
                return this.commentList[id] ? this.commentList[id] : [];
            },
            resetReply: function () {
                this.$store.dispatch('resetReplyId');
                this.replyCommentText = '';
            },
            addComment: function (id) {
                // TODO: add post query
            }
        },
        mounted() {
            axios.default.get('/api/comments')
                .then(response => {
                    if (response.data.error)
                        console.log('ERROR: ' + response.data.message);
                    else if (response.data.data.commentList === null)
                    {
                        this.$store.dispatch('resetCommentList');
                        this.noComments = true;
                    }
                    else
                        this.$store.dispatch('setCommentList', response.data.data.commentList);
                })
                .catch(e => {
                    this.$store.dispatch('resetCommentList');
                    this.noComments = true;

                    console.log('HTTP error: ' + e.response.status);
                    if (e.response.data.error && e.response.data.message)
                        console.log('Message: ' + e.response.data.message);
                    else
                        console.log('Message: ' + e.response.statusText)
                });
        },
        components: {
            CommentItem
        }
    }
</script>

