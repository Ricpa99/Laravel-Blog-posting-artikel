import Navbar from "@/Layouts/Navbar";
import { Head, usePage } from "@inertiajs/react";



export default function Home({title}){
   const page = usePage()
   console.log(page);
   return (
      <>
      <Head title={title}/>
      <Navbar title={title}>
      <article className="max-w-7xl mx-auto ">
            <h2>Welcome to my blog</h2>
      </article>
      </Navbar>
      </>
   )
}