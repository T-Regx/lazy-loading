window.addEventListener("load", initializeApplication);

function initializeApplication() {
  const loadMoreButton = document.getElementById("loadMorePosts");
  loadMoreButton.addEventListener("click", loadMorePages);
}

function loadMorePages() {
  const currentPage = getCurrentPage();
  const nextPage = currentPage + 1;

  fetch('index.php?' + new URLSearchParams({page: nextPage}))
    .then(response => response.json())
    .then(posts => {
      insertPosts(posts);
      setCurrentPage(nextPage);
    });
}

function insertPosts(posts) {
  const [postsElement] = document.getElementsByClassName("posts");
  posts.forEach(post => {
    postsElement.appendChild(constructPostElement(post.title, post.content))
  });
}

function constructPostElement(title, content) {
  const post = document.createElement("div");
  post.className = "post";

  const titleElement = document.createElement("h4");
  titleElement.innerText = title;

  const contentElement = document.createElement("p");
  contentElement.innerText = content;

  post.appendChild(titleElement);
  post.appendChild(contentElement);

  return post;
}

function setCurrentPage(page) {
  const [postsElement] = document.getElementsByClassName("posts");
  postsElement.dataset['currentPage'] = page;
}

function getCurrentPage() {
  const [postsElement] = document.getElementsByClassName("posts");
  return parseInt(postsElement.dataset['currentPage']);
}
