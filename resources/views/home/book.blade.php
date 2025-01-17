<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flip Book</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            background: url('{{ asset('home/images/bac.jpg') }}') no-repeat center center/cover;
            font-family: Arial, sans-serif;
            padding-top: 45px;
        }

        .flip-book-container {
            position: relative;
            width: 100%;
            max-width: 700px;
            perspective: 1000px;
            margin-top: 0;
        }

        .flip-book {
            width: 100%;
            height: 750px;
            position: relative;
            transform-style: preserve-3d;
        }

        .page {
            position: absolute;
            width: 100%;
            height: 700px;
            background: orange;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            transform-origin: left;
            transition: transform 1s ease;
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
            padding: 20px;
            backface-visibility: hidden;
            flex-direction: column;
        }

        .page-content {
            text-align: left;
            padding: 0;
            flex-grow: 1;
            overflow: visible;
        }

        .page-content h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .page-content p {
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 15px;
        }

        .flipped {
            transform: rotateY(-180deg);
        }

        .cover-page {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .cover-page img {
            max-width: 80%;
            height: auto;
            margin-bottom: 20px;
        }

        .control-buttons {
            position: absolute;
            width: 100%;
            display: flex;
            justify-content: space-between;
            bottom: 10px;
            padding: 0 20px;
            transform: none;
        }

        button {
            background-color: #a746d3;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 20px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: transparent;
            border-color: #a746d3;
        }

        button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        button:disabled {
    background-color: #ccc;
    cursor: not-allowed;
}
/* Apply a smooth transition for scaling */
.scaled-content {
    transition: transform 0.3s ease;
}

/* For Small Screens (Mobile) */
.d-md-none .scaled-content {
    transform: scale(0.8);
    transform-origin: top;
}

/* For Medium Screens (Tablet) */
.d-none.d-md-block.d-lg-none .scaled-content {
    transform: scale(0.9);
    transform-origin: top;
}

/* For Large Screens (Desktop) */
.d-none.d-lg-block .scaled-content {
    transform: scale(1);
    transform-origin: top;
}

/* For Small Screens (Mobile) */
@media (max-width: 767px) {
    .scaled-content {
        transform: scale(0.8);
    }
}

/* For Medium Screens (Tablet) */
@media (min-width: 768px) and (max-width: 1199px) {
    .scaled-content {
        transform: scale(0.9);
    }
}

/* For Large Screens (Desktop) */
@media (min-width: 1200px) {
    .scaled-content {
        transform: scale(1);
    }
}

    </style>
</head>
<body>

    <div class="flip-book-container">
        <div class="flip-book" id="book">
            <!-- Pages will be dynamically generated here -->
        </div>
        <div class="control-buttons">
            <button id="prev-btn">Previous</button>
            <button id="next-btn">Next</button>
        </div>
    </div>

    <script>
        const postTitle = @json($post->title);  // Passing post title from backend
        const postContent = @json($post->content);  // Passing content from backend
        const featureImagePath = "{{ asset('feature_image/' . $post->feature_image) }}";  // Correct image path
        const pagesContainer = document.querySelector('#book');
        const prevButton = document.getElementById('prev-btn');
        const nextButton = document.getElementById('next-btn');
        let currentPage = 0;
        const wordsPerPage = 160; // Adjust this value based on how much text you want per page (rough estimate)

        // Function to split content by word count
        function splitContentIntoPages(content) {
            const pageContent = [];
            const words = content.split(' '); // Split the content into words
            let currentPageContent = [];

            // Iterate over the words and split them into pages
            for (let i = 0; i < words.length; i++) {
                currentPageContent.push(words[i]);

                // If we've reached the word limit for a page, push to pages and reset
                if (currentPageContent.length >= wordsPerPage) {
                    pageContent.push(currentPageContent.join(' '));
                    currentPageContent = [];
                }
            }

            // Push any remaining content to the last page
            if (currentPageContent.length > 0) {
                pageContent.push(currentPageContent.join(' '));
            }

            return pageContent;
        }

        // Create cover page with title and feature image
        function createCoverPage() {
            const coverPage = document.createElement('div');
            coverPage.classList.add('page');
            coverPage.classList.add('cover-page');
            coverPage.innerHTML = `
                <h2>${postTitle}</h2>
                <br><br>
                <img src="${featureImagePath}" alt="Feature Image">
            `;
            pagesContainer.appendChild(coverPage);
        }
        createCoverPage();
        // Generate pages for the flipbook
        const contentPages = splitContentIntoPages(postContent);
        contentPages.forEach((pageText, index) => {
            const page = document.createElement('div');
            page.classList.add('page');
            page.innerHTML = `
                <div class="page-content">
                    <h2>Page ${index + 2}</h2> <!-- Start with Page 2 for content -->
                    <p>${pageText}</p>
                </div>
            `;
            pagesContainer.appendChild(page);
        });

        // Update flipbook view based on current page
        function updateFlipBook() {
            const allPages = document.querySelectorAll('.page');
            allPages.forEach((page, index) => {
                if (index === currentPage) {
                    page.style.zIndex = allPages.length;
                    page.classList.remove('flipped');
                } else if (index < currentPage) {
                    page.style.zIndex = allPages.length - index;
                    page.classList.add('flipped');
                } else {
                    page.style.zIndex = allPages.length - index;
                    page.classList.remove('flipped');
                }
            });
            updateButtonState();
        }

        // Disable/Enable buttons based on current page
        function updateButtonState() {
            prevButton.disabled = currentPage === 0;
            nextButton.disabled = currentPage === contentPages.length ;  // Add 1 for the cover page
        }

        // Button click handlers
        prevButton.addEventListener('click', () => {
            if (currentPage > 0) {
                currentPage--;
                updateFlipBook();
            }
        });

        nextButton.addEventListener('click', () => {
            if (currentPage < contentPages.length + 1) {  // Add 1 for the cover page
                currentPage++;
                updateFlipBook();
            }
        });

        // Initialize flipbook with cover page

        updateFlipBook();
    </script>

</body>
</html>
