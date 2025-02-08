import Navbar from "@/Layouts/Navbar";
import { Head, Link, useForm, usePage } from "@inertiajs/react";
import Login from "./Auth/Login";


export default function Blogs({title, posts, pos}){
   console.log(posts);
   const page = usePage().props.posts
   const {post, setData, data, errors, get} = useForm()
   const submit = (e) => {
      e.preventDefault();
      get('/blogs')
   }
   return (
      <>
      <Head title={title}/>
      <Navbar title={title}>
         <div className=" relative">
         <div className="md:my-16 max-md:my-4 bg-white  md:max-w-screen-sm 
         sm:max-w-md max-sm:max-w-72 w-full max-md:max-w-xl max-xl:max-w-md mx-auto rounded-md ">
            <form onSubmit={submit}>
               <div className="flex gap-2">
                  <div className="flex md:p-2 max-md:p-1 gap-2 items-center w-full flex-grow">
                  <svg class="icon search max-w-5 fill-slate-300" viewBox="0 0 32 32">
                        <title>search</title>
                        <path d="M30.56 28.64l-5.76-5.76c2.24-2.4 3.52-5.6 3.52-9.12 0-7.52-6.24-13.76-13.76-13.76s-13.76 6.24-13.76 13.76 6.24
                        13.76 13.76 13.76c2.72 0 5.12-0.8 7.36-2.080l6.080 6.080c0.32 0.32 0.8 0.48 1.28 0.48s0.96-0.16 1.28-0.48c0.8-0.8 0.8-2.080 
                        0-2.88zM4.64 13.76c0-5.44 4.48-9.92 9.92-9.92s9.92 
                        4.48 9.92 9.92-4.48 9.92-9.92 9.92-9.92-4.48-9.92-9.92z"></path>
                        </svg>
                        <input name="search" onChange={(e) => setData('search', e.target.value)} placeholder="search" 
                        className="w-full focus:ring-0 border-none outline-none" type="text" id="" />
                  </div>
                  <button type="submit" className="rounded-r-md max-sm:text-sm bg-blue-400 p-2 font-bold 
                  hover:bg-blue-500 transition delay-75">Search</button>
               </div>
            </form>
         </div>
        
            <article className="flex md:gap-5 md:justify-center gap-2 flex-wrap 
            max-md:justify-center 
            max-w-7xl  mx-auto w-full p-5">
               <div className={`text-3xl mt-20 max-sm:mt-14 text-slate-300 ${posts.data == 0 ? '' : 'hidden' }`}>
                  404|Not found
               </div>
            {/* &laquo; */}
                  {posts.data.map((post,i) => {
                     return (
                        <>
                        <div key={post.id} className="min-h-72 p-3 
                        md:w-72
                        max-md:w-3/2
                        max-lg:w-full
                        max-sm:min-w-full bg-white shadow-lg rounded-lg relative">
                              <div>
                                 <Link href={`/blog/${post.slug}`} className="md:text-2xl text-base font-bold">{post.title}</Link>
                                 <div><small className="font-semibold">By </small> 
                                 <Link className="text-xs text-slate-400 mt-5" href={`/author/${post.author.username}`}>{post.author.name}</Link> 
                                 <small className="font-semibold"> in </small>
                                  <Link className={`text-xs text-slate-400 mt-5 
                                 ${post.category.name == 'web design' ? 'p-1 bg-pink-500 text-white rounded-sm' : ''}
                                 ${post.category.name == 'ui ux' ? 'p-1 bg-purple-500 text-white rounded-sm' : ''}
                                 ${post.category.name == 'dart' ? 'p-1 bg-green-500 text-white rounded-sm' : ''}
                                 ${post.category.name == 'machine learning' ? 'p-1 bg-red-500 text-white rounded-sm' : ''}
                                 
                                 `} href={`/category/${post.category.slug}`}>{post.category.name}</Link>
                              </div>
                                 <p className="text-slate-700 mt-6">{post.body}</p>
                              </div>
                              <Link className="text-xs mt-5 bottom-2 text-blue-400 absolute" href={`/blog/${post.slug}`}>Read more &raquo; </Link>
                        </div>
                        </>
                     )
                  })}
            </article>
                  <div className={`p-3 w-max md:ml-16 max-lg:ml-4 max-sm:ml-4 mb-7 flex gap-2 rounded-md 
                  bg-white shadow-lg font-bold text-slate-500 
                     ${page.prev_page_url == null && page.next_page_url == null ? 'hidden' : ''}`}>
                     <Link className={`${page.prev_page_url == null ? 'hidden' : ''}`} href={page.prev_page_url}>Prev</Link>
                     <span>{page.current_page}</span>
                     <Link className={`${page.next_page_url == null ? 'hidden' : ''}`} href={page.next_page_url}>Next</Link>
                  </div>
            </div>
      </Navbar>
      </>
   )
}