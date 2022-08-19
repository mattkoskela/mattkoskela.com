import * as React from "react"
import { Link } from "gatsby"

const Navi = () => {
    return (
      <>
        <Link to="/">Home</Link>
        <br />
        <Link to="/tech">Tech</Link>
        <br />
        <Link to="/photography">Photography</Link>
        <br />
        <Link to="/library">Library</Link>
        <br />
        <Link to="/about">About</Link>
      </>
    )
  }

export default Navi