import { Link, useForm, usePage } from "@inertiajs/react";
import { useCallback, useState } from "react";

export default function Navbar({children, title}){
   const [btn, setBtn] = useState(false)
   const {post} =useForm()
   const auth = usePage().props.auth.user;
   const logOut = () => {
      console.log(true);
      post(route('blogs.keluar'))
   }
   
   const page = usePage().component
   return (
      <>
   
      <div className="w-full bg-slate-800 min-h-16 flex items-center">
         <div className="container max-w-7xl mx-auto md:px-5 flex max-sm:px-0 md:justify-between text-slate-300 font-bold md:items-center">
            <nav className={`flex mt-1 max-sm:inline-block max-sm:text-xs text-xs md:text-base  [&>*]:rounded-sm [&>*]:p-1 
            [&>*]:mx-4  w-1/2`}>
               <Link className={` max-sm:flex ${page == "Home" ? 'bg-slate-900' : ''} hover:bg-slate-100/10 w-max h-max`} href="/">Home</Link>
               <Link className={`${page == "Blog" ? 'bg-slate-900' : ''} ${btn ? 'max-sm:inline-block': 'max-sm:hidden'} hover:bg-slate-100/10 w-max h-max`} href="/blogs">Blog</Link>
               <Link className={`${page == "About" ? 'bg-slate-900' : ''} ${btn ? 'max-sm:inline-block': 'max-sm:hidden'} hover:bg-slate-100/10 w-max h-max`} href="/about">About</Link>
               <Link className={`${page == "title" ? 'bg-slate-900' : ''} ${btn ? 'max-sm:inline-block': 'max-sm:hidden'} hover:bg-slate-100/10 w-max h-max`} href="/contact">Contact</Link>
               <span className={` sm:hidden flex flex-grow flex-col ${btn ? 'max- sm:flex-col': 'max-sm:hidden'}`}>
               <Link className="hover:bg-slate-100/10 w-max p-1 rounded-sm"  onClick={logOut} >Your Profile</Link>
               <Link className="hover:bg-slate-100/10 w-max p-1 rounded-sm" onClick={logOut} >Sign out</Link>
               </span>
            </nav>
            <nav className="w-1/2 flex relative sm:flex-col justify-end items-end max-sm:right-4 max-sm:top-4 max-sm:absolute max-sm:w-full">
               <span onClick={() => setBtn(!btn)} className="cursor-pointer"> 
                  <svg className="ms-2 -me-0.5 h-4 w-4"
                     xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 20 20"
                     fill="currentColor" >
                  <path fillRule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clipRule="evenodd" />
                  </svg>
               </span>
               <div className={`${!btn && 'hidden'} max-sm:hidden max-sm:mr-3 max-w-24 flex flex-col text-center z-10 absolute text-white text-sm shadow-md bg-slate-900 rounded-md max-sm:text-base p-2 translate-y-[4rem]`}>
                  <Link href={route('login')}>Login</Link>
                  <Link onClick={()=> logOut} className={`${auth ? 'hidden' : ''}`}>Log out</Link>
                  <Link className={`${!auth ? 'hidden' : ''}`}>Dashboard</Link>
               </div>
            </nav>
         </div>
      </div>
      <div className="min-h-[166vh] bg-slate-100">
            <div className="md:min-h-20 min-h-12 bg-white font-semibold shadow-md">
               <div className="max-w-7xl mx-auto px-9 max-sm:px-3 h-full">
                  <h2 className="md:text-3xl text-base">{title}</h2>
               </div>
            </div>
            {children} 
      </div>
      </>
   )
}