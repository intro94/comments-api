<template>
        <div class="container content-tree-item">
            <article class="media">
                <div class="media-content">
                    <div class="content">
                        <p>
                            <strong>User Name</strong> <small>@username</small> <small>31m</small>
                            <br>
                            {{ item.comment_text }}
                        </p>
                    </div>
                    <nav class="level is-mobile">
                        <div class="level-left">
                            <button class="button level-item" @click="$store.dispatch('setReplyId', item.id)">
                                Reply
                            </button>
                            <button class="button level-item">
                                Edit
                            </button>
                            <button class="button level-item">
                                Delete
                            </button>
                        </div>
                    </nav>
                </div>
            </article>
            <div v-if="replyId === item.id" class="columns reply-form">
                <article class="column media">
                    <form @submit.prevent="addComment(item.id)" class="media-content">
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

            <div class="container content-tree-nested">
                <CommentItem
                    v-for="(child, subIndex) in getCommentsGroup(item.id)"
                    :item="child"
                    :index="subIndex"
                    :key="child.id"
                />
            </div>
        </div>
</template>

<script>
    export default {
        name: "CommentItem",
        data() {
            return {
                replyCommentText: ''
            }
        },
        props: {
            item: {
                type: Object,
                required: true
            },
            index: {
                type: Number,
                required: true
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
        }
    }
</script>

<style lang="scss" scoped>
    .button {
        padding-top: 0;
        padding-bottom: 0;
        height: inherit;
    }

    @media screen and (max-width: 1023px) {
        .reply-form {
            margin-left: calc(100% - (100vw - 3rem));

            .column.media {
                padding: 0.75rem 0;
            }
        }
    }
</style>
