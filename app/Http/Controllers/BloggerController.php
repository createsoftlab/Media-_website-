<?php

namespace App\Http\Controllers;

use App\Models\Post;
use DOMDocument;
use Illuminate\Http\Request;

class BloggerController extends Controller
{
//     function splitContentWithHtmlAndImages($htmlContent, $wordLimit, $imageWeight = 50) {
//         $dom = new DOMDocument();
//         @$dom->loadHTML(mb_convert_encoding($htmlContent, 'HTML-ENTITIES', 'UTF-8'));

//         $chunks = [];
//         $currentWords = 0;
//         $currentChunk = '';

//         foreach ($dom->getElementsByTagName('body')->item(0)->childNodes as $node) {
//             if ($node->nodeName === 'img') {
//                 // Count an image as part of the word limit
//                 $currentWords += $imageWeight;
//                 $currentChunk .= $dom->saveHTML($node);
//             } else {
//                 // Count words in text content
//                 $textContent = strip_tags($dom->saveHTML($node));
//                 $words = str_word_count($textContent);
//                 $currentWords += $words;
//                 $currentChunk .= $dom->saveHTML($node);
//             }

//             // If the current chunk exceeds the word limit, save it
//             if ($currentWords >= $wordLimit) {
//                 $chunks[] = $currentChunk;
//                 $currentWords = 0;
//                 $currentChunk = '';
//             }
//         }

//         // Add any remaining content as the last chunk
//         if (!empty($currentChunk)) {
//             $chunks[] = $currentChunk;
//         }

//         return $chunks;
//     }

//     function getPost($id, $page = 1) {
//         $post = Post::findOrFail($id);

//         // Define the word limit and image weight
//         $wordLimit = 200; // Words per page
//         $imageWeight = 50; // Each image counts as 50 words

//         // Split the content
//         $contentChunks = $this->splitContentWithHtmlAndImages($post->content, $wordLimit, $imageWeight);

//         // Ensure the page number is within the correct range
//         $page = max(1, min($page, count($contentChunks)));  // Ensure page is within bounds

//         // Get the specific chunk for the requested page
//         $currentPageContent = $contentChunks[$page - 1] ?? '';

//         return view('home.book', [
//             'post' => $post,
//             'currentPageContent' => $currentPageContent,
//             'totalPages' => count($contentChunks),
//             'currentPage' => $page,
//             'contentChunks' => $contentChunks, // Pass all content chunks to the view
//         ]);
//     }
 }

