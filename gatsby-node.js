const path = require(`path`)
const { createFilePath } = require(`gatsby-source-filesystem`)

exports.createPages = async ({ graphql, actions, reporter }) => {
  const { createPage } = actions

  // Define a template for blog post
  const blogPost = path.resolve(`./src/templates/blog-post.js`)

  // Get all markdown blog posts sorted by date
  const resultOld = await graphql(
    `
      {
        allMarkdownRemark(
          sort: { fields: [frontmatter___date], order: ASC }
          limit: 1000
        ) {
          nodes {
            id
            fields {
              slug
            }
          }
        }
      }
    `
  )
const result = await graphql(
  `
    {
      allFile(
        filter: {internal: {mediaType: {eq: "text/markdown"}}, sourceInstanceName: {eq: "tech"}}
        sort: {fields: childrenMarkdownRemark___frontmatter___date, order: ASC}
        limit: 1000
      ) {
        edges {
          node {
            childMarkdownRemark {
              id
              fields {
                slug
              }
            }
            sourceInstanceName
          }
        }
      }
    }
  `
)

  if (result.errors) {
    reporter.panicOnBuild(
      `There was an error loading your blog posts`,
      result.errors
    )
    return
  }

  //const posts = result.data.allMarkdownRemark.nodes
  let posts = result.data.allFile.edges
  if (posts.length > 0) {
    posts = posts.map((post) => (
      {
        ...post.node.childMarkdownRemark,
        "category": post.node.sourceInstanceName,
      }
    ))
  }

  // Create blog posts pages
  // But only if there's at least one markdown file found at "content/blog" (defined in gatsby-config.js)
  // `context` is available in the template as a prop and as a variable in GraphQL

  if (posts.length > 0) {
    posts.forEach((post, index) => {
      //console.log("post", post)
      //console.log(`${post.category}/${post.fields.slug}`)
      const previousPostId = index === 0 ? null : posts[index - 1].id
      const nextPostId = index === posts.length - 1 ? null : posts[index + 1].id

      createPage({
        path: `/${post.category}${post.fields.slug}`,
        component: blogPost,
        context: {
          id: post.id,
          previousPostId,
          nextPostId,
        },
      })
    })
  }
}

exports.onCreateNode = ({ node, actions, getNode }) => {
  const { createNodeField } = actions

  if (node.internal.type === `MarkdownRemark`) {
    const value = createFilePath({ node, getNode })

    console.log('node', node)
    console.log('value', value)
    console.log('value2', `/tech${value}`)
    console.log('actions', actions)

    createNodeField({
      name: `slug`,
      node,
      value: `/tech${value}`,
    })
  }
}

exports.createSchemaCustomization = ({ actions }) => {
  const { createTypes } = actions

  // Explicitly define the siteMetadata {} object
  // This way those will always be defined even if removed from gatsby-config.js

  // Also explicitly define the Markdown frontmatter
  // This way the "MarkdownRemark" queries will return `null` even when no
  // blog posts are stored inside "content/blog" instead of returning an error
  createTypes(`
    type SiteSiteMetadata {
      author: Author
      siteUrl: String
      social: Social
    }

    type Author {
      name: String
      summary: String
    }

    type Social {
      twitter: String
    }

    type MarkdownRemark implements Node {
      frontmatter: Frontmatter
      fields: Fields
    }

    type Frontmatter {
      title: String
      description: String
      date: Date @dateformat
    }

    type Fields {
      slug: String
    }
  `)
}