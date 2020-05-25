const url = "http://127.0.0.1:8000/api/node/";
const searchInput = document.querySelector("#search");
const matchList = document.querySelector("#match-list");
const parentNodeInput = document.querySelector("#parent_node");

searchInput.addEventListener("input", () => searchNodes(searchInput.value));

const searchNodes = async (searchWord) => {
    if (searchWord.length > 0) {
        const response = await fetch(url + searchWord);
        const nodes = response.json();

        nodes.then((node) => {
            if (searchWord.length === 1) {
                node = [];
            }
            formatNodes(node);
        });
    }
};

const formatNodes = (nodes) => {
    html = nodes
        .map(
            (node) => `
        <div class="card card-body" style="cursor:pointer" onclick="setParentNodeId(${node.id}, '${node.description}')">
            <a>${node.description}</a>
        </div>
    `
        )
        .join("");

    matchList.innerHTML = html;
};

const setParentNodeId = (id, description) => {
    parentNodeInput.value = id;
    searchInput.value = description;
    matchList.innerHTML = "";
};
