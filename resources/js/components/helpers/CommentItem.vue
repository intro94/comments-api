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
                            <button class="button level-item">
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

            <div class="container content-tree-nested">
                <CommentItem
                    v-for="(child, subIndex) in getChildren(item.id)"
                    :item="child"
                    :index="subIndex"
                    :key="child.id"
                    :commentList="commentList"
                />
            </div>
        </div>
</template>

<script>
    export default {
        name: "CommentItem",
        props: {
            commentList: {
                type: Object,
                required: false
            },
            item: {
                type: Object,
                required: true
            },
            index: {
                type: Number,
                required: true
            }
        },
        methods: {
            getChildren: function (id) {
                return this.commentList[id] ? this.commentList[id] : [];
            }
        }
    }
</script>

<style scoped>
    .button {
        padding-top: 0;
        padding-bottom: 0;
        height: inherit;
    }
</style>
