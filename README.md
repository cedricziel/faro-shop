# Faro Shop

A simple e-commerce website built with PHP, PostgreSQL. 
Monitored by Grafana Application Observability.

## Running it

### In K8s (kind)

Follow the instructions to set up Kubernetes monitoring and **save the values
in `k8s/kubernetes-monitoring.values.yaml`**.

```bash
# Create a kind cluster
kind create cluster --name faro-shop

# Deploy Kubernetes Monitoring
helm repo add grafana https://grafana.github.io/helm-charts &&
  helm repo update &&
  helm upgrade --install --atomic --timeout 300s grafana-k8s-monitoring grafana/k8s-monitoring \
    --namespace "faro-shop" --create-namespace \
    --values k8s/kubernetes-monitoring.values.yaml

# Deploy the application
helm upgrade --install \
  --create-namespace \
  --namespace faro-shop \
  --set app.env.OTEL_EXPORTER_OTLP_ENDPOINT=http://grafana-k8s-monitoring-grafana-agent.default.svc.cluster.local:4318 \
  faro-shop \
  k8s/charts/faro-shop
```
