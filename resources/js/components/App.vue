<template>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col">
        <div id="gantt-container">
          <div id="gantt-header-rows">
            <table>
              <tr class="gantt-header">
                <th>Name</th>
                <th>Start</th>
                <th>End</th>
                <th>Color</th>
              </tr>
              <tr v-for="project in projects" :key="project.id">
                <td>{{ project.name }}</td>
                <td><input v-model="project.start" :max="project.end" type="number" placeholder="Start"></td>
                <td><input v-model="project.end" :min="project.start" type="number" placeholder="End"></td>
                <td><input v-model="project.color" type="color" placeholder="Color"></td>
              </tr>
            </table>
          </div>
          <div id="gantt-body" :style="{height: getBodyHeight(50)+'px'}">
            <div id="gantt-header-columns" class="gantt-header" :style="{width: getBodyWidth()+'px'}">
              <div v-for="i in getHeaderRange()" :key="i">
                {{ i }}
              </div>
            </div>
            <canvas id="gantt-grid" />
            <div id="gantt-rows" :style="{height: getBodyHeight()+'px', width: getBodyWidth()+'px'}">
              <div v-for="(project, i) in projects" :key="project.id" class="gantt-item" :style="setView(project, i)">
                {{ project.name }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

const cellWidth = 25
const lineHeight = 30
let headerScaleMin = 0

export default {
  data: () => ({
    projects: [
      {
        id: 1,
        name: 'oui',
        start: 1,
        end: 15,
        color: '#2f8ad6'
      },
      {
        id: 2,
        name: 'non',
        start: 3,
        end: 10,
        color: '#41d62f'
      },
      {
        id: 3,
        name: 'non',
        start: 1,
        end: 2,
        color: '#d64c2f'
      },
      {
        id: 4,
        name: 'non',
        start: 4,
        end: 130,
        color: '#2fd6b5'
      },
      {
        id: 5,
        name: 'non',
        start: 5,
        end: 7,
        color: '#d6ba2f'
      },
      {
        id: 6,
        name: 'non',
        start: 7,
        end: 150,
        color: '#9e2fd6'
      }
    ]
  }),
  mounted () {
    // todo resize

    const canvas = document.getElementById('gantt-grid')
    canvas.height = this.getBodyHeight()
    canvas.width = this.getBodyWidth()
    const ctx = canvas.getContext('2d')
    ctx.lineWidth = 0.2
    ctx.beginPath()
    const h = this.getBodyHeight()
    for (let x = cellWidth; x <= this.getBodyWidth(); x += cellWidth) {
      ctx.moveTo(x, 0)
      ctx.lineTo(x, h)
    }
    ctx.strokeStyle = '#666666'
    ctx.stroke()

    ctx.beginPath()
    const w = this.getBodyWidth()
    for (let y = lineHeight; y <= this.getBodyHeight(); y += lineHeight) {
      ctx.moveTo(0, y)
      ctx.lineTo(w, y)
    }
    ctx.strokeStyle = '#666666'
    ctx.stroke()
  },
  methods: {
    addProject (project) {
      this.projects.push(project)
    },
    getBodyWidth () {
      return this.getHeaderRange().length * cellWidth
    },
    getBodyHeight (more = 0) {
      return this.projects.length * lineHeight + more
    },
    getHeaderRange () {
      headerScaleMin = Math.min(...this.projects.map(project => project.start))
      const max = Math.max(...this.projects.map(project => project.end))
      const arr = []
      let i = headerScaleMin
      while (i <= max) {
        arr.push(i)
        i++
      }
      return arr
    },
    setView (project, i) {
      return {
        left: (project.start - headerScaleMin) * cellWidth + 2 + 'px',
        top: i * lineHeight + 2 + 'px',
        width: (project.end - project.start + 1) * cellWidth - 4 + 'px',
        'background-color': project.color
      }
    }
  }
}
</script>

<style lang="scss" scoped>
table {
  tr {
    max-height: 30px;
  }

  input {
    width: 50px;
    max-height: 28px;
  }
}

#gantt-container {
  display: flex;
  position: relative;
  border: 1px solid grey;
  overflow-y: scroll;
  overflow-x: hidden;

  #gantt-body {
    border-left: 1px solid grey;
    overflow-x: scroll;
    position: relative;
  }

  #gantt-grid {
    position: absolute;
  }

  .gantt-header {
    height: 30px;
    border-bottom: 1px solid grey;
  }

  .gantt-item {
    border: 1px solid grey;
  }

  #gantt-rows {
    overflow: hidden;
    position: absolute;

    & > div {
      position: sticky;
      height: 26px;
    }
  }

  #gantt-header-columns {
    display: flex;
    text-align: center;

    & > div {
      flex-direction: row;
      width: 25px;
      border-left: 1px solid grey;

      &:first-child {
        border-left: none;
      }
    }
  }
}
</style>
