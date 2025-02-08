import Navbar from "@/Layouts/Navbar";
import { Head, Link, usePage } from "@inertiajs/react";



export default function Blogs({title, post}){
   const page = usePage()
   return (
      <>
      <Head title={title}/>
      <Navbar title={title}>
            <article className="flex md:gap-5 md:justify-center gap-2 flex-wrap 
            max-md:justify-center 
            max-w-7xl mx-auto w-full p-5">
            
            {post.map((pos, i) => {
               return (
               <>
                  <div  className="p-3 w-full max-w-6xl min-h-screen bg-white shadow-lg rounded-lg relative">
                        <div className="text-sm p-3">
                           <div className="w-full">
                           <h1 className="md:text-4xl text-2xl font-bold">{pos.title}</h1>
                           <div className={`text-sm sm:text-base text-slate-400 mt-3`}>
                              {pos.author.name} <br/>
                              <div className={`text-xs w-max ${pos.category.name == 'web design' ? 'p-1 bg-pink-500 text-white rounded-sm' : ''}
                                 ${pos.category.name == 'ui ux' ? 'p-1 bg-purple-500 text-white rounded-sm' : ''}
                                 ${pos.category.name == 'dart' ? 'p-1 bg-green-500 text-white rounded-sm' : ''}
                                 ${pos.category.name == 'machine learning' ? 'p-1 bg-red-500 text-white rounded-sm' : ''}`}>
                              <Link href={`/category/${pos.category.slug}`}>{pos.category.name}</Link>
                              </div>
                           </div>
                           </div>
                           <p className="text-slate-700 mt-3 sm:text-2xl text-lg text-justify mt-6">{pos.body} </p>
                           </div>
                           <Link className="bottom-2 left-6 text-blue-400 absolute" href={`/blogs`}>&laquo; Back </Link>
                   </div>
               </>
               )
            
            })}
            </article>
      </Navbar>
      </>
   )
}